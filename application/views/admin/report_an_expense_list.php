<?php include('menu.php');?>

<div class="content-page">

    <!-- Start content -->
    <div class="content">
        <div class="container-fluid  content-outer px-0">
            <div class="row">
                <div class="col-xl-12 px-md-0 d-flex justify-content-between align-items-center mb-3">
                    <div class="pl-md-0">
                        <h1 class="main-title float-left">Report an Expense</h1>
                    </div>
                    <?php if ($this->role_id!= 1): ?>
    <a href="<?php echo base_url()?>Dashboard/report_an_expense" class="btn">
        Report an Expense
    </a>
<?php endif; ?>

                </div>
                <div class="col-md-5 pl-md-0">
                    <div class="form-group position-relative">
                        <input type="text" class="form-control search_input" placeholder="Search">
                        <i class="fa fa-search searchBtn"></i>
                        <button class="filter_btn">
                           Filter
                           <i class="fa fa-filter"></i>
                        </button>
                    </div>
                </div>
                <div class="col-md-7 text-md-right text-center mb-md-0 mb-3 pr-md-0">
                    <!-- <button class="btn btn_csv_download">
                        <i class="fa fa-download"></i> Download CSV
                    </button> -->
                    <button class="btn btn_csv_download">
    <a href="<?php echo base_url('Dashboard/export_expense_report'); ?>" class="text-white">
        <i class="fa fa-download"></i> Download CSV
    </a>
</button>

                    <button class="btn btn_csv_download">
                        <i class="fa fa-refresh"></i>  Sync All
                    </button>
                </div>
            </div>
        </div>
        <div class="container-fluid content-inner px-2">
            <!-- end row -->
            <div class="card mb-3 dashboard-content dashboard-content-card h-100-ie">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive bg pl-0">
                            <table class="table">
                                <thead class="text-center">
                                    <tr>
                                        <th class="td_xlxx sticky-col">
                                            <div class="inner_th_flex d-flex align-items-center">
                                            <p class="mb-0">
                                                Submission Date
                                            </p> 
                                           <span class="d-inline-flex flex-column">
                                             <i class="fa fa-chevron-up"></i>
                                             <i class="fa fa-chevron-down"></i>
                                           </span>
                                            </div>
                                        </th>
                                        <th class="td_xlxx" title="What restaurant is this expense for?">
                                            <div class="inner_th_flex d-flex align-items-center">
                                               <p class="mb-0"> What restaurant i... <i class="fa fa-info-circle"></i>
                                               </p>
                                               <span class="d-inline-flex flex-column">
                                                 <i class="fa fa-chevron-up"></i>
                                                 <i class="fa fa-chevron-down"></i>
                                                </span>
                                            </div>
                                        </th>
                                        <th class="td_xlxxl">
                                           <div class="inner_th_flex d-flex align-items-center">
                                            <p class="mb-0">
                                                Email
                                            </p>
                                            <span class="d-inline-flex flex-column">
                                                <i class="fa fa-chevron-up"></i>
                                                <i class="fa fa-chevron-down"></i>
                                            </span>
                                           </div> 
                                        </th>
                                        <th class="td_xlxx" title="What date did the restaurant incur the expense?">
                                            <div class="inner_th_flex d-flex align-items-center">
                                                <p class="mb-0">
                                                    What date did the r... <i class="fa fa-info-circle"></i>
                                                </p>
                                                <span class="d-inline-flex flex-column">
                                                    <i class="fa fa-chevron-up"></i>
                                                    <i class="fa fa-chevron-down"></i>
                                                </span>
                                            </div>
                                        </th>
                                        <th class="td_xlxx" title="Are you reporting an invoice, salary, a one-time expense, or something else?">
                                            <div class="inner_th_flex d-flex align-items-center">
                                                <p class="mb-0">
                                                    Are you reporting...<i class="fa fa-info-circle"></i>
                                                </p>
                                                <span class="d-inline-flex flex-column">
                                                    <i class="fa fa-chevron-up"></i>
                                                    <i class="fa fa-chevron-down"></i>
                                                </span>
                                            </div>
                                         </th>
                                        <!-- <th class="td_xlxx" title="What date is the invoice for?">
                                            <div class="inner_th_flex d-flex align-items-center">
                                                 <p class="mb-0">
                                                    What date is the inv... <i class="fa fa-info-circle"></i>
                                                 </p>
                                                 <span class="d-inline-flex flex-column">
                                                    <i class="fa fa-chevron-up"></i>
                                                    <i class="fa fa-chevron-down"></i>
                                                </span>
                                            </div>
                                        </th> -->
                                        <!-- <th class="td_xlxx" title="Enter the Totals by Category">
                                           <div class="inner_th_flex d-flex align-items-center">
                                              <p class="mb-0">
                                                Enter the Totals b... <i class="fa fa-info-circle"></i>
                                              </p>
                                              <span class="d-inline-flex flex-column">
                                                <i class="fa fa-chevron-up"></i>
                                                <i class="fa fa-chevron-down"></i>
                                              </span>
                                           </div>
                                        </th> -->
                                        <!-- <th class="td_xlxx" title="What is the total yearly salary amount you wish to add?">
                                            <div class="inner_th_flex d-flex align-items-center">
                                                <p class="mb-0">
                                                    What is the total y... <i class="fa fa-info-circle"></i>
                                                </p>
                                                <span class="d-inline-flex flex-column">
                                                    <i class="fa fa-chevron-up"></i>
                                                    <i class="fa fa-chevron-down"></i>
                                                </span>
                                            </div>
                                        </th>
                                        <th class="td_xlxx" title="What is the category of your one-time expense?">
                                            <div class="inner_th_flex d-flex align-items-center">
                                                <p class="mb-0">
                                                    What is the categor...<i class="fa fa-info-circle"></i>
                                                </p>
                                                <span class="d-inline-flex flex-column">
                                                    <i class="fa fa-chevron-up"></i>
                                                    <i class="fa fa-chevron-down"></i>
                                                </span>
                                            </div>
                                        </th>
                                        <th class="td_xlxx" title="What is the one-time expense amount you would like to report?">
                                            <div class="inner_th_flex d-flex align-items-center">
                                                <p class="mb-0">
                                                    What is the one-time... <i class="fa fa-info-circle"></i>
                                                </p>
                                                <span class="d-inline-flex flex-column">
                                                    <i class="fa fa-chevron-up"></i>
                                                    <i class="fa fa-chevron-down"></i>
                                                </span>
                                            </div>
                                        </th>
                                        <th class="td_xlxx" title='What is the "other" expense you would like to report?'>
                                            <div class="inner_th_flex d-flex align-items-center">
                                                <p class="mb-0">
                                                    What is the "o... <i class="fa fa-info-circle"></i>
                                                </p>
                                                <span class="d-inline-flex flex-column">
                                                    <i class="fa fa-chevron-up"></i>
                                                    <i class="fa fa-chevron-down"></i>
                                                </span>
                                            </div>
                                        </th>
                                        <th class="td_xlxx" title="What is the amount of the expense?">
                                            <div class="inner_th_flex d-flex align-items-center">
                                                <p class="mb-0">
                                                    What is the amount... <i class="fa fa-info-circle"></i>
                                                </p>
                                                <span class="d-inline-flex flex-column">
                                                    <i class="fa fa-chevron-up"></i>
                                                    <i class="fa fa-chevron-down"></i>
                                                </span>
                                            </div>
                                        </th> -->
                                        <!-- <th>Status</th> -->
                                        <th class="td_xlxx text-center">Action</th>
                                    </tr>
                                </thead>
                                <!-- <tbody class="allRestaurants text-center">

                                </tbody> -->
                                <?php
usort($expenses, function($a, $b) {
    return $b['creation_time'] - $a['creation_time']; 
});
?>
                                <?php if (empty($expenses)): ?>
                    <tr>
                        <td colspan="9">No Expenses found.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($expenses as $expense): ?>
                                <tbody class="text-center">
                                    <tr>
                                        <td class="sticky-col"><?= date('Y-m-d', $expense['creation_time']); ?>
                                        </td>
                                        <td><?= $expense['restaurant_name']; ?></td>
                                        <td><?= $expense['email']; ?></td>
                                        <td><?= $expense['expense_date']; ?></td>
                                        <td><?= $expense['report_category_name']; ?></td>
                                        <!-- <td><?= $expense['invoice_date']; ?></td> -->
                                        <!-- <td>30.52</td> -->
                                        <!-- <td><?= $expense['yearly_salary']; ?></td>
                                        <td><?= $expense['one_time_category']; ?></td>
                                        <td><?= $expense['one_time_amount']; ?></td>
                                        <td><?= $expense['other_expense_description']; ?></td>
                                        <td><?= $expense['other_expense_amount']; ?></td> -->
                                        <td class="text-center">
                                        <a href="<?php echo base_url()?>Dashboard/edit_report_expense/<?= $expense['report_expense_id']; ?>" class="icon-edit-delete editText">
                    <i class="fas fa-pencil-alt" title="Edit Restaurant" aria-hidden="true"></i>
                </a> &nbsp;&nbsp;
    <!-- <a href="javascript:void(0);" class="icon-edit-delete editText">
        <i class="fas fa-pencil-alt" title="Edit Report an Expense" aria-hidden="true"></i>
    </a>&nbsp;&nbsp; -->
    <span class="icon-edit-delete deleteText">
        <!-- Add data-expense-id to the delete icon -->
        <i class="fas fa-trash" title="Delete Report an Expense" data-toggle="modal" data-target="#deleteUser" 
   aria-hidden="true" data-expense-id="<?= $expense['report_expense_id']; ?>"></i>
  </span>
    <span title="Sync">&nbsp;&nbsp;
        <i class="fa fa-refresh"></i>
    </span>
</td>

                                    </tr>
                                   
                                </tbody>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </table>
                            <div id="pagination"></div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end row -->
            <!-- end row -->


        </div>
        <!-- END container-fluid -->

    </div>
    <!-- END content -->

</div>








<div class="modal fade custom-modal" id="deleteUser" data-backdrop="static" data-keyboard="false" tabindex="-1"
    role="dialog" aria-labelledby="modal_add_user" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content modal-content-customize">
            <div class="modal-header header-delete modal_header-blue">
                <h5 class="modal-title p-2">Delete Expense</h5>
                <button type="button" class="close close_model" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="background: none;">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <span style="color: red" class="update_error"></span>
                            <div class="col-12 d-flex justify-content-center">
                                <h4 class="text-center">Are you sure, you want to delete <b class="category_name"></b> expense?</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 text-center">
                        <button type="button" onclick="removeExpense();" class="btn btn-success btn-gradient-blue">Yes</button>
                        <button type="button" class="btn btn-danger role_close" data-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
    // When delete icon is clicked
    $('.deleteText i').on('click', function() {
        var expenseId = $(this).data('expense-id');
        var expenseName = $(this).closest('tr').find('td:nth-child(2)').text(); // Assuming restaurant name is in the second column
        $('.category_name').text(expenseName); // Set expense name in the modal
        $('#deleteUser').data('expense-id', expenseId); // Store the expense ID in modal
    });
});

function removeExpense() {
    var expenseId = $('#deleteUser').data('expense-id'); // Get expense ID from modal
    console.log('Deleting Expense with ID:', expenseId); // Debugging log

    $.ajax({
       
        url:  base_url + controller + '/deactivate_expense/',// Endpoint to deactivate the expense
        method: 'POST',
        data: { expense_id: expenseId },
        success: function(response) {
            console.log('Response from server:', response); // Debugging log
            response = JSON.parse(response);
            if(response.success) {
                // Successfully deactivated, reload page or update the UI
                location.reload(); // Reload the page to see changes
            } else {
                // Error message if failed
                $('.update_error').text(response.message);
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', status, error); // Debugging log
            $('.update_error').text('An error occurred while processing your request.');
        }
    });
}


    </script>
 