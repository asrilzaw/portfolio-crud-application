<?php
require_once '../includes/config.php';
require_once '../includes/session.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once '../includes/layouts/header.php' ?>
<body>
<?php require_once '../includes/layouts/navigation.php'; ?>
<main role="main">
    <section class="section-accounts mt-3">
        <div class="container">
            <div class="section-title d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Accounts</h5>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createAccount">
                    <i class="fa fa-plus"></i> Create Account
                </button>
                <div class="modal fade" id="createAccount" tabindex="-1" aria-labelledby="createAccountLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="createAccountLabel">Create Account</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?=URLROOT?>/src/accounts-create.php" method="POST">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="inputName">Name</label>
                                        <input type="text" class="form-control" id="inputName" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail">Email</label>
                                        <input type="email" class="form-control" id="inputEmail" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPhone">Phone</label>
                                        <input type="text" class="form-control" id="inputPhone" name="phone" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputTitle">Title</label>
                                        <select class="custom-select" id="inputTitle" name="title" required>
                                            <option selected>Open this select menu</option>
                                            <option value="Lawyer">Lawyer</option>
                                            <option value="Assistant">Assistant</option>
                                            <option value="Manager">Manager</option>
                                            <option value="Supervisor">Supervisor</option>
                                            <option value="Employee">Employee</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <?php if (isset($_GET['detail'])) :
                require_once '../src/accounts-read-one.php'; ?>
                <dl class="row">
                    <dt class="col-sm-1">ID</dt>
                    <dd class="col-sm-11"><?=$account['account_id']?></dd>

                    <dt class="col-sm-1">Name</dt>
                    <dd class="col-sm-11"><?=$account['account_name']?></dd>

                    <dt class="col-sm-1">Email</dt>
                    <dd class="col-sm-11"><?=$account['account_email']?></dd>

                    <dt class="col-sm-1">Phone</dt>
                    <dd class="col-sm-11"><?=$account['account_phone']?></dd>

                    <dt class="col-sm-1">Title</dt>
                    <dd class="col-sm-11"><?=$account['account_title']?></dd>

                    <dt class="col-sm-1">Created</dt>
                    <dd class="col-sm-11"><?=$account['account_created']?></dd>
                </dl>
            <?php else :
                require_once '../src/accounts-read-all.php'; ?>
                <table class="table table-hover table-striped">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col" class="text-center" style="width: 50px">#</th>
                        <th scope="col" style="width: 175px">Name</th>
                        <th scope="col" style="width: 250px">Email</th>
                        <th scope="col" style="width: 150px">Phone</th>
                        <th scope="col" style="width: 125px">Title</th>
                        <th scope="col" style="width: 150px">Created</th>
                        <th scope="col" style="width: 75px"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($accounts as $account) :
                        if (isset($_GET['update']) && ($_GET['update'] == $account['account_id'])) : ?>
                            <form action="<?=URLROOT?>/src/accounts-update.php?id=<?=$account['account_id']?>" method="POST">
                                <tr>
                                    <td class="text-center"><?=$account['account_id']?></td>
                                    <td style="padding: 0.3rem 0.1rem;"><input type="text" class="form-control" value="<?=$account['account_name']?>" name="name"></td>
                                    <td style="padding: 0.3rem 0.1rem;"><input type="text" class="form-control" value="<?=$account['account_email']?>" name="email"></td>
                                    <td style="padding: 0.3rem 0.1rem;"><input type="text" class="form-control" value="<?=$account['account_phone']?>" name="phone"></td>
                                    <td style="padding: 0.3rem 0.1rem;">
                                        <select class="custom-select" name="title">
                                            <option selected hidden><?=$account['account_title']?></option>
                                            <option value="Lawyer">Lawyer</option>
                                            <option value="Assistant">Assistant</option>
                                            <option value="Manager">Manager</option>
                                            <option value="Supervisor">Supervisor</option>
                                            <option value="Employee">Employee</option>
                                        </select>
                                    </td>
                                    <td><?=$account['account_created']?></td>
                                    <td class="text-center list-icon">
                                        <button type="submit" id="submit" class="btn btn-link text-success p-0" title="Submit"><i class="fa fa-check fa-xs"></i></button>
                                        <button type="button" id="cancel" class="btn btn-link text-danger p-0" title="Cancel"><i class="fa fa-close fa-xs"></i></button>
                                    </td>
                                </tr>
                            </form>
                        <?php else : ?>
                            <tr>
                                <td class="text-center"><?=$account['account_id']?></td>
                                <td><?=$account['account_name']?></td>
                                <td><?=$account['account_email']?></td>
                                <td><?=$account['account_phone']?></td>
                                <td><?=$account['account_title']?></td>
                                <td><?=$account['account_created']?></td>
                                <td class="text-center list-icon">
                                    <a href="<?=URLROOT?>/views/accounts.php?detail=<?=$account['account_id']?>" class="text-dark" title="Detail"><i class="fa fa-eye fa-xs"></i></a>
                                    <a href="<?=URLROOT?>/views/accounts.php?update=<?=$account['account_id']?>" class="text-success" title="Update"><i class="fa fa-pencil fa-xs"></i></a>
                                    <a href="<?=URLROOT?>/src/accounts-delete.php?delete=<?=$account['account_id']?>" class="text-danger" title="Delete"><i class="fa fa-trash fa-xs"></i></a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </section>
</main>
<?php
require_once '../includes/layouts/footer.php';
require_once '../includes/layouts/scripts.php';
?>
</body>
</html>
