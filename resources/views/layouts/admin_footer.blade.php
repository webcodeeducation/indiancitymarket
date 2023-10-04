                <!-- Interest Modal -->
                <div id="viewFeaturedPlan" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>        
                        <h4 class="modal-title">Apply Customer Plan</h4>
                      </div>
                      <div class="modal-body">
                        <div class="login-w3ls">
                            <form id="applyPlanForm" action="#" method="post">
                                {{csrf_field()}}
                <input type="hidden" name="user_id" id="user_id" value="">
                <div class="form-group">
                  <label for="sel1">Select Plan:</label>
                <select class="form-control" name="plan" id="showplans">
                </select>
                </div>
                <div class="form-group">
                  <label for="usr">Amount:</label>
                  <input type="text" class="form-control" name="amount" id="amount" value="">
                </div>
                                <div class="form-group">
                  <label for="usr">Contacts:</label>
                  <input type="text" class="form-control" name="contacts" id="contacts" value="">
                </div> 
                                <div id="response_here"></div> 
                                <div class="clearfix"> </div>
                                <input type="button" class="btn btn-primary btnApplyPlan" name="submit" value="Apply">
                                <div class="clearfix"></div> 
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Interest Modal -->
