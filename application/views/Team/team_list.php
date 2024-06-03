<div class="container-xxl flex-grow-1 container-p-y">                                             
    <!-- Complex Headers -->                          
    <div class="card">          
        <div class="card-body"> 
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-header p-0">Team List</h5>                             
            </div>       

            <div class="table-responsive tbl-padding">     
                <form id="statuslist" method="post" >
                    <input type="hidden" name="listtbl" value="team">
                    <input type="hidden" name="page_name" value="Team">
                    <input type="hidden" id="url22" value="fetch-teamlist">
 
                    <table class="table table-striped" id="example">                  
                        <thead>   

                            <tr>
                                <th colspan="8" class="px-0">
                                    <button type="submit"  id="delete_all" name="delete_all" value= "Delete" class="btn p-0" style="display: none;">
                                        <!--Delete-->
                                        <i class="menu-icon tf-icons bx bxs-trash mx-1"></i>
                                    </button>
                                    <!--<button type="submit" id="sta" class="btn btn-label-secondary btn-xs" disabled>Change Status</button> -->
                                    <button type="button" id="status" name="status" value="Status" class="btn btn-outline-success btn-xs" style="display:none;" >Change Status</button>
                                </th>
                            </tr>
                            <tr>  
                                <th>
                                    <input type="checkbox" id="toggle" value="Select All" onclick="toggle_check()" class="form-check-input">
                                </th>
                                <th>Sr No</th>                                  
                                <th> Name</th>                                       
                                <th>Designation</th>                                      
                                <th>Brief Intro</th>                                                                            
                                <th>Current Status</th>
                                <th>Created Date</th>
                                <th>Action</th>                                   
                            </tr>                      
                        </thead>             
                        <tbody>                                         
                        </tbody>                    
                    </table>  
                </form>
            </div>      
        </div>    
    </div>
</div> 
<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">  
    <div class="modal-dialog" role="document">    
        <div class="modal-content">           
            <div class="modal-header">           
                <h5 class="modal-title" id="modalLongTitle">Brief Intro</h5>          
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>           
            </div>           
            <div class="modal-body">            
                <p id="briefintro" ></p>          
            </div>         
            <div class="modal-footer">              
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>       
            </div>       
        </div>   
    </div>
</div>          

<div class="modal fade" id="seqeditauthor" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <form class="update-seqteam" method="post">                   
            <input type="hidden" class="form-control" id="idcatpro" name="id">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Sequence</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">

                            <label class="form-label" for="modalEditUserFirstName">Sequence Id</label>

                            <input type="text" class="form-control" placeholder="Enter Sequence Id" id="seq_id" name="seq_id">

                            <div class="invalid-feedback" id="seq_error"></div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="seq-btn" class="btn btn-primary m-t-15 waves-effect">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>
