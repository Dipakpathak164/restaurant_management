<?php
// Step 1: Domo API Credentials
$client_id = ""; // Replace with your actual Domo Client ID
$client_secret = ""; // Replace with your actual Secret
$embed_id = "mO5vG"; // Replace with your actual dashboard ID

// Step 2: Request an OAuth Token
$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => "https://api.domo.com/oauth/token?grant_type=client_credentials&scope=data%20user%20dashboard",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
    CURLOPT_USERPWD => "$client_id:$client_secret"
]);

$response = curl_exec($ch);
$err = curl_error($ch);
curl_close($ch);

if ($err) {
    die("Error: $err");
}

$auth_response = json_decode($response, true);
$access_token = $auth_response['access_token']; // Store the Access Token

// Step 3: Request an Embed Token with Filtering
$ch2 = curl_init();
curl_setopt_array($ch2, [
    CURLOPT_URL => "https://api.domo.com/v1/cards/embed/auth",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode([
        "sessionLength" => 1440, // Session duration in minutes (24 hours)
        "authorizations" => [
            [
                "token" => $embed_id,
                "permissions" => ["READ", "FILTER", "EXPORT"], // Set permissions
                "filters" => [
                    [
                        "column" => "Master Location", // Column to filter by
                        "operator" => "IN", // Filtering condition
                        "values" => ["Collective Coffee and Bakery"] // Value to match
                    ]
                ]
            ]
        ]
    ]),
    CURLOPT_HTTPHEADER => [
        "Authorization: Bearer $access_token",
        "Content-Type: application/json"
    ]
]);

$response2 = curl_exec($ch2);
$err2 = curl_error($ch2);
curl_close($ch2);

if ($err2) {
    die("Error: $err2");
}

$embed_response = json_decode($response2, true);
$embed_token = $embed_response['authentication']; // Get the Embed Token

?>
<?php include('menu.php');?>
<div class="content-page">

    <!-- Start content -->
    <div class="content">
        <div class="container-fluid content-inner">
            <!-- end row -->
            <div class="card mb-3 dashboard-content dashboard-content-card h-100-ie">
            <h1>Domo Dashboard - Filtered for "Collective Coffee and Bakery"</h1>
            <!-- Step 4: Embed the Dashboard using iframe -->
            <iframe id="domoDashboard" class="dashboard-container"
            src="https://public.domo.com/cards/<?php echo $embed_id; ?>"
             allowfullscreen>
             </iframe>
            </div>
            <!-- end row -->
            <!-- end row -->


        </div>
        <!-- END container-fluid -->

    </div>
    <!-- END content -->

</div>
<!-- END content-page -->

    <!-- Step 5: Inject the Embed Token (Post to Domo Dashboard) -->
    <script>
        window.onload = function () {
            var form = document.createElement("form");
            form.setAttribute("method", "post");
            form.setAttribute("action", "https://public.domo.com/cards/<?php echo $embed_id; ?>");

            var tokenInput = document.createElement("input");
            tokenInput.setAttribute("type", "hidden");
            tokenInput.setAttribute("name", "embedToken");
            tokenInput.setAttribute("value", "<?php echo $embed_token; ?>");

            form.appendChild(tokenInput);
            document.body.appendChild(form);
            form.submit(); // Auto-submit the form to pass the embed token
        };
    </script>
 
