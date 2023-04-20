<br>
<div class="card">
    <div class="card-header">
        Management
    </div>
    <div class="card-body">
        <div calss="container">
        <table class="table table-light" id="table_management">
            <thead>
                <th>List</th>
                <th style="text-align:right">Action</th>
            </thead>
            <tbody style="font-weight:normal">
                <tr>
                    <td>Course</td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <div class="btn btn-primary" data-bs-toggle="modal" onclick="view_course()"
                                data-bs-target="#open_manage">View</div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Section</td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <div class="btn btn-primary" data-bs-toggle="modal" onclick="view_section()"
                                data-bs-target="#open_manage">View</div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Subject</td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <div class="btn btn-primary" data-bs-toggle="modal" onclick="view_subject()"
                                data-bs-target="#open_manage">View</div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="open_manage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Management</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="manage_list">

                </div>

            </div>

            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>