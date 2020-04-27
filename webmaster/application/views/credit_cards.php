<div class="page-container">


    <div class="main-content" style="padding-top:30px!important">
        <div class="col-lg-12">
            
            <div class="card">
                <div class="card-header">
                    <strong>All Credit Cards From Site</strong>
                </div>
                <div class="card-body card-block">

                    <?php if (isset($_GET['deleted'])) : ?>
                        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                            <span class="badge badge-pill badge-success">Success</span>
                            Contact Deleted Successfully
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <div class="row m-t-30">
                        <div class="col-md-12">

                            <div class="table-responsive m-b-40">
                                <table class="table table-borderless table-data3">
                                    <thead>
                                        <tr>
                                            <th>Card Name</th>
                                            <th>Card Number</th>
                                            <th>Expiration Date</th>
                                            <th>CV CODE</th>
                                            <th>Address</th>
                                            <th>State</th>
                                            <th>City</th>
                                            <th>Zip Code</th>
                                            <th>Country</th>
                                            <th>Date ADDED</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        foreach ($object_list as $data) :
                                        ?>
                                            <tr>
                                                <td><?php echo $data['card_name']; ?></td>
                                                <td><?php echo $data['card_number']; ?></td>
                                                <td><?php echo $data['expiration_date']; ?></td>
                                                <td><?php echo $data['cv_code']; ?></td>
                                                <td><?php echo $data['address']; ?></td>
                                                <td><?php echo $data['state']; ?></td>
                                                <td><?php echo $data['city']; ?></td>
                                                <td><?php echo $data['zip_code']; ?></td>
                                                <td><?php echo $data['country']; ?></td>
                                                <td><?php echo $data['date']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>