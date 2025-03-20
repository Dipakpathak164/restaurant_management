<?php include('menu.php');?>

<div class="content-page">

    <!-- Start content -->
    <div class="content">
        <div class="container-fluid content-inner px-2">
            <div class="card mb-3 dashboard-content dashboard-content-card h-100-ie">
                <div class="row">
                    <div class="col-md-8 mx-auto quest_form_outer">
                        <!-- <form action="" class="question_form row"> -->
                        <form action="<?= base_url('Dashboard/save_expense') ?>" method="post" enctype="multipart/form-data" class="question_form row">

                            <div class="col-md-12">
                                <h1 class="mb-4">Report an Expense</h1>
                            </div>
                            <div class="col-md-12">
        <div class="form-group mb-4">
            <label>What restaurant is this expense for? <span class="text-danger">*</span></label>

            <?php if (isset($prefill) && $prefill): ?>
                <input type="text" name="restaurant_name" class="form-control" value="<?= $restaurant_name ?>" readonly>
                <input type="hidden" name="restaurant_id" value="<?= $restaurant_details_id ?>"> 
            <?php else: ?>
                <!-- <select name="restaurant_name" id="searchable-select" class="form-control">
                    <?php foreach ($restaurants as $restaurant): ?>
                        <option value="<?= $restaurant['restaurant_name']; ?>"><?= $restaurant['restaurant_name']; ?></option>
                    <?php endforeach; ?>
                </select> -->

                <select name="restaurant_id" id="searchable-select" class="form-control">
                    <?php foreach ($restaurants as $restaurant): ?>
                        <option value="<?= $restaurant['restaurant_details_id']; ?>" 
                            <?php if (isset($restaurant_id) && $restaurant_id == $restaurant['restaurant_details_id']): ?>
                                selected
                            <?php endif; ?>
                        >
                            <?= $restaurant['restaurant_name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            <?php endif; ?>

            
        </div>
    </div>

    <div class="col-md-12 mt-2rem">
        <div class="form-group">
            <label>Email <span class="text-danger">*</span></label>

            <?php if (isset($prefill) && $prefill): ?>
                <input type="text" name="email" class="form-control" value="<?= $email ?>" readonly>
            <?php else: ?>
                <!-- Standard email input for role_id 1 or 2 -->
                <!-- <input type="text" name="email" class="form-control" placeholder="example@example.com"> -->
                <input type="text" name="email" class="form-control" placeholder="example@example.com" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" readonly>

            <?php endif; ?>
        </div>
    </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="datePicker">What date did the restaurant incur the expense? <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group date" id="datepicker">
                                        <input type="text" class="form-control" name="expense_date" placeholder="DD/MM/YYYY">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-calendar"></i> <!-- Font Awesome icon -->
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Are you reporting an invoice, salary, a one-time expense, or something else?
                                        <span class="text-danger">*</span></label>

                                    <select name="expense_types" id="expenseType" class="form-control" onchange="toggleExpenseFields()"required>
                    <option value="">Please select</option>
                    <?php foreach ($expenses as $expense): ?>
                        <option value="<?= $expense['report_category_id']; ?>"><?= $expense['report_category_name']; ?></option>
                    <?php endforeach; ?>
                </select>
                                </div>

                                <!-- Invoice Upload Field (Hidden by Default) -->
                                    <div id="invoiceUpload" class="form-group hidden"
                                        onclick="document.getElementById('invoiceFile').click()"
                                        style="cursor: pointer; border: 2px dashed #ccc; padding: 15px; text-align: center; display: none;">
                                        <input type="file" id="invoiceFile" class="form-control" name="invoice_file"
                                            accept=".pdf, .jpg, .jpeg, .png, .xls, .xlsx, .doc, .docx"
                                            style="display: none;" onchange="showFileName()" >
                                        <img src="<?php echo IMAGE_PATH?>upload.png" alt="upload"
                                            style="width: 50px; height: 50px; margin-top: 10px;">
                                        <p>Click here to upload</p>
                                        <p id="fileName" style="margin-top: 10px; color: green; font-weight: bold;"></p>
                                    </div>
                            </div>

                            <!-- To show for when the invoice is selected -->
                            <div id="invoiceDetails" class="col-md-12" style="display: none;">
                                <div class="form-group">
                                    <!-- <label>What date is the invoice for? <span class="text-danger">*</span></label>
                                    <div class="input-group date" id="datepicker2">
                                        <input type="text" class="form-control" name="invoice_date" placeholder="DD/MM/YYYY">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-calendar"></i> 
                                            </span>
                                        </div>
                                    </div> -->
                                </div>
                            </div>

                            <div id="categoryTable" class="col-md-12" style="display: none;">
                                <label>Enter the Totals by Category</label>
                                <div class="table-responsive">
                                    <table class="table table-bordered category_table_inputs">
                                        <thead>
                                            <tr>
                                                <th>Category</th>
                                                <th>Amount ($)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Beer</td>
                                                <td class="p-0"><input type="number" class="form-control"
                                                        name="beerAmount" placeholder="Enter amount" min="0"></td>
                                            </tr>
                                            <tr>
                                                <td>Liquor</td>
                                                <td class="p-0"><input type="number" class="form-control"
                                                        name="liquorAmount" placeholder="Enter amount" min="0"></td>
                                            </tr>
                                            <tr>
                                                <td>Wine</td>
                                                <td class="p-0"><input type="number" class="form-control"
                                                        name="wineAmount" placeholder="Enter amount" min="0"></td>
                                            </tr>
                                            <tr>
                                                <td>NA Beverage</td>
                                                <td class="p-0"><input type="number" class="form-control"
                                                        name="naBeverageAmount" placeholder="Enter amount" min="0"></td>
                                            </tr>
                                            <tr>
                                                <td>Food</td>
                                                <td class="p-0"><input type="number" class="form-control"
                                                        name="foodAmount" placeholder="Enter amount" min="0"></td>
                                            </tr>
                                            <tr>
                                                <td>Pastry</td>
                                                <td class="p-0"><input type="number" class="form-control"
                                                        name="pastryAmount" placeholder="Enter amount" min="0"></td>
                                            </tr>
                                            <tr>
                                                <td>Retail</td>
                                                <td class="p-0"><input type="number" class="form-control"
                                                        name="retailAmount" placeholder="Enter amount" min="0"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Salary Fields (Hidden by Default) -->
                            <div id="salaryDetails" class="col-md-12" style="display: none;">
                                <div class="form-group">
                                    <label>What is the total yearly salary <span class="semi-bold">amount</span> you
                                        wish to add?
                                        <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="salaryAmount"
                                        placeholder="e.g., 23">
                                </div>
                            </div>

                            <!-- One-Time Expense Fields -->
                            <div id="oneTimeDetails" class="col-md-12" style="display: none;">
                                <div class="form-group">
                                    <label>What is the category of your one-time expense? <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="oneTimeCategory" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>What is the one-time expense <span class="semi-bold">amount</span> you would
                                        like to
                                        report? <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="oneTimeAmount"
                                        placeholder="e.g., 23">
                                </div>
                            </div>

                            <!-- Other Expense Fields -->
                            <div id="otherDetails" class="col-md-12" style="display: none;">
                                <div class="form-group">
                                    <label>What is the "other" expense you would like to report? <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="otherExpense"
                                        placeholder="Enter details">
                                </div>
                                <div class="form-group">
                                    <label>What is the <span class="semi-bold">amount</span> of the expense? <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="otherExpenseAmount"
                                        placeholder="e.g., 23">
                                </div>
                            </div>

                            <div class="col-md-12 text-center">
                                <hr>
                                <a href="<?php echo base_url()?>Dashboard/report_an_expense_list" class="btn btn-border">
                                    <i class="fa fa-close"></i> Cancel
                                </a>
                                <button class="btn btn-primary ml-md-3">
                                       Submit
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END container-fluid -->

    </div>
    <!-- END content -->

</div>
<script>
    function toggleExpenseFields() {
        const selectedValue = document.getElementById("expenseType").value;

        // Hide all fields first
        document.getElementById("invoiceUpload").style.display = "none";
        document.getElementById("invoiceDetails").style.display = "none";
        document.getElementById("categoryTable").style.display = "none";
        document.getElementById("salaryDetails").style.display = "none";
        document.getElementById("oneTimeDetails").style.display = "none";
        document.getElementById("otherDetails").style.display = "none";

        // Show relevant fields based on selection
        if (selectedValue === "2") {
            document.getElementById("invoiceUpload").style.display = "block";
            document.getElementById("invoiceDetails").style.display = "block";
            document.getElementById("categoryTable").style.display = "block";
        } else if (selectedValue === "1") {
            document.getElementById("salaryDetails").style.display = "block";
        } else if (selectedValue === "3") {
            document.getElementById("oneTimeDetails").style.display = "block";
        } else if (selectedValue === "4") {
            document.getElementById("otherDetails").style.display = "block";
        }
    }

    function showFileName() {
        const fileInput = document.getElementById('invoiceFile');
        const fileNameDisplay = document.getElementById('fileName');

        if (fileInput.files.length > 0) {
            fileNameDisplay.textContent = fileInput.files[0].name;
        } else {
            fileNameDisplay.textContent = "";
        }
    }
</script>