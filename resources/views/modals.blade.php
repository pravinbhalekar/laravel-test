<!-- Modal -->
<div class="modal fade" id="EditUserModel" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form id="EditUserForm" autocomplete="off">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="hidden" name="userid" id="userid" class="form-control" />
                            <div class="form-group">
                                <label for="pwd">Name </label>
                                <input type="text" name="name" id="name" placeholder="Name" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="pwd">Mobile Number </label>
                                <input type="text" name="mno" id="mno" placeholder="Mobile Number" class="form-control" maxlength="10" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="pwd">Email </label>
                                <input type="email" name="email" id="email" placeholder="Email" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="pwd">Birthdate </label>
                                <input type="date" name="birth_date" id="birth_date" placeholder="Email" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="pwd">Gender </label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="1">Male</option>
                                    <option value="2">Famale</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="pwd">Qualification </label>
                                <input type="text" name="qualification" id="qualification" placeholder="Qualification" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="pwd">Salary </label>
                                <input type="text" name="salary" id="salary" placeholder="Salary" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="pwd">Address </label>
                                <textarea name="address" id="address" placeholder="Address" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <button type="submit" id="submitBtn" name="button" class="btn">Submit</button>
                        </div>
                    </div>
                    <br />
                    <p id="message"></p>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="DeleteUserModel" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <form id="DeleteUser">
                <div class="modal-body text-center">
                    <h4>Are you sure want to delete this user ?</h4>
                    <br />
                    <input type="hidden" name="userid" id="user_id">
                    <button type="submit" id="deleteBtn" class="btn">Yes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <br /> <br />
                    <p id="deletemessage"></p>
                </div>
            </form>    
        </div>
    </div>
</div>
