<?php include('menu.php'); ?>

<div class="content-page">
    <div class="content">
        <div class="container-fluid content-inner px-2">
            <div class="card mb-3 dashboard-content dashboard-content-card h-100-ie">
                <div class="row">
                    <div class="col-md-8 mx-auto quest_form_outer">
                        <form action="<?php echo base_url('Dashboard/edit_expense/' . $expense['report_expense_id']); ?>" method="post" class="question_form row">
                            <div class="col-md-12">
                                <h1>Edit Report an Expense</h1>
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-4">
                                    <label>What restaurant is this expense for? <span class="text-danger">*</span></label>
                                    <input type="text" name="email" class="form-control" value="<?php echo $expense['restaurant_name']; ?>" placeholder="example@example.com" readonly>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input type="text" name="email" class="form-control" value="<?php echo $expense['email']; ?>" placeholder="example@example.com" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="datePicker">What date did the restaurant incur the expense? <span class="text-danger">*</span></label>
                                    <div class="input-group date" id="datepicker">
                                        <input type="text" name="expense_date" class="form-control" value="<?php echo $expense['expense_date']; ?>" placeholder="DD/MM/YYYY">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Are you reporting an invoice, salary, a one-time expense, or something else? <span class="text-danger">*</span></label>
                                    <select id="expenseType" name="expense_type" class="form-control" onchange="toggleExpenseFields()">
                                        <option value="">Please Select</option>
                                        <option value="2" <?php echo ($expense['expense_type'] == '2') ? 'selected' : ''; ?>>Invoice</option>
                                        <option value="1" <?php echo ($expense['expense_type'] == '1') ? 'selected' : ''; ?>>Salary</option>
                                        <option value="3" <?php echo ($expense['expense_type'] == '3') ? 'selected' : ''; ?>>One-time Expense</option>
                                        <option value="4" <?php echo ($expense['expense_type'] == '4') ? 'selected' : ''; ?>>Other</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Invoice Fields -->
                            <?php if ($expense['expense_type'] == '2'): ?>

                                <div id="invoiceUpload" class="col-md-12" style="display: none;">
                                    <div class="form-group" onclick="document.getElementById('invoiceFile').click()" style="cursor: pointer; border: 2px dashed #ccc; padding: 15px; text-align: center;">
                                        <input type="file" id="invoiceFile" class="form-control" accept=".pdf, .jpg, .jpeg, .png, .xls, .xlsx, .doc, .docx" style="display: none;" onchange="showFileName()">
                                        <img src="<?php echo IMAGE_PATH?>upload.png" alt="upload" style="width: 50px; height: 50px; margin-top: 10px;">
                                        <p>Click here to upload</p>
                                        <p id="fileName" style="margin-top: 10px; color: green; font-weight: bold;"></p>
                                    </div>
                                </div>
                                <div id="invoiceDetails" class="col-md-12" style="display: none;">
                                    <div class="form-group">
                                        <!-- <label>What date is the invoice for? <span class="text-danger">*</span></label>
                                        <div class="input-group date" id="datepicker2">
                                            <input type="text" name="invoice_date" class="form-control" value="<?php echo $invoice['invoice_date']; ?>" placeholder="DD/MM/YYYY">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                                <div id="categoryTable" class="col-md-12">
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
                                                    <td class="p-0"><input type="number" name="beerAmount" class="form-control" value="<?php echo $invoice['beer_expense']; ?>" placeholder="Enter amount" min="0"></td>
                                                </tr>
                                                <tr>
                                                    <td>Liquor</td>
                                                    <td class="p-0"><input type="number" name="liquorAmount" class="form-control" value="<?php echo $invoice['liquor_expense']; ?>" placeholder="Enter amount" min="0"></td>
                                                </tr>
                                                <tr>
                                                    <td>Wine</td>
                                                    <td class="p-0"><input type="number" name="wineAmount" class="form-control" value="<?php echo $invoice['wine_expense']; ?>" placeholder="Enter amount" min="0"></td>
                                                </tr>
                                                <tr>
                                                    <td>NA Beverage</td>
                                                    <td class="p-0"><input type="number" name="naBeverageAmount" class="form-control" value="<?php echo $invoice['beverage_expense']; ?>" placeholder="Enter amount" min="0"></td>
                                                </tr>
                                                <tr>
                                                    <td>Food</td>
                                                    <td class="p-0"><input type="number" name="foodAmount" class="form-control" value="<?php echo $invoice['food_expense']; ?>" placeholder="Enter amount" min="0"></td>
                                                </tr>
                                                <tr>
                                                    <td>Pastry</td>
                                                    <td class="p-0"><input type="number" name="pastryAmount" class="form-control" value="<?php echo $invoice['pastry_expense']; ?>" placeholder="Enter amount" min="0"></td>
                                                </tr>
                                                <tr>
                                                    <td>Retail</td>
                                                    <td class="p-0"><input type="number" name="retailAmount" class="form-control" value="<?php echo $invoice['retail_expense']; ?>" placeholder="Enter amount" min="0"></td>
                                                </tr>
                                               </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php endif; ?>


 <!-- Salary Fields (Hidden by Default) -->

 <?php if ($expense['expense_type'] == '1'): ?>

  
  
 <div id="salaryDetails" class="col-md-12"  style="display: none;">
                                <div class="form-group">
                                    <label>What is the total yearly salary <span class="semi-bold">amount</span> you
                                        wish to add?
                                        <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="salaryAmount" value="<?php echo $salary['yearly_salary']; ?>" 
                                        placeholder="e.g., 23">
                                </div>
                            </div>
                            <?php endif; ?>


                            <!-- One-Time Expense Fields -->
                            <?php if ($expense['expense_type'] == '3'): ?>

                            <div id="oneTimeDetails" class="col-md-12" style="display: none;">
                                <div class="form-group">
                                    <label>What is the category of your one-time expense? <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="oneTimeCategory" value="<?php echo $one_time['one_time_category']; ?>" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>What is the one-time expense <span class="semi-bold">amount</span> you would
                                        like to
                                        report? <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="oneTimeAmount" value="<?php echo $one_time['one_time_amount']; ?>" 
                                        placeholder="e.g., 23">
                                </div>
                            </div>
                            <?php endif; ?>


                            <!-- Other Expense Fields -->
                            <?php if ($expense['expense_type'] == '4'): ?>

                            <div id="otherDetails" class="col-md-12" style="display: none;">
                                <div class="form-group">
                                    <label>What is the "other" expense you would like to report? <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="otherExpense" value="<?php echo $other['other_expense_description']; ?>" 
                                        placeholder="Enter details">
                                </div>
                                <div class="form-group">
                                    <label>What is the <span class="semi-bold">amount</span> of the expense? <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="otherExpenseAmount" value="<?php echo $other['other_expense_amount']; ?>" 
                                        placeholder="e.g., 23">
                                </div>
                            </div>
                            <?php endif; ?>


                            <div class="col-md-12 text-center">
                                <hr>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
window.onload = function() {
    toggleExpenseFields(); // This will trigger the visibility of the fields
    console.log("Expense type: " + document.getElementById("expenseType").value); // Check if value is correctly set
}

function toggleExpenseFields() {
    const selectedValue = document.getElementById("expenseType").value;
    console.log("Selected Expense Type: ", selectedValue); // Log to see which value is selected

    // List of elements we want to manipulate
    const elementsToHide = [
        "invoiceUpload", "invoiceDetails", "categoryTable", 
        "salaryDetails", "oneTimeDetails", "otherDetails"
    ];

    // First, hide all the elements
    elementsToHide.forEach((id) => {
        const element = document.getElementById(id);
        if (element) {
            element.style.display = "none";  // Hide the element if it's found
        } else {
            console.error(`Element with id "${id}" not found!`);
        }
    });

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


// Add an event listener for the change event so that the form updates when the user selects an expense type.
document.getElementById("expenseType").addEventListener("change", toggleExpenseFields);

</script>

<script>
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

<script>
    $(document).ready(function () {
        $('#datepicker').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
            todayHighlight: true
        });

        $('#datepicker2').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
            todayHighlight: true
        });
    });
</script>
