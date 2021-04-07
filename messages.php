<!DOCTYPE html>
<html>
<!--start head-->
<?php  include('include/head.php');   ?>
<!--end head-->
<body>

<div id="myModal" class="modal fade">
    <div id="myModal" class="modal fade">
      <div class="modal-dialog" style="max-width: 500px;">
       <div class="modal-content" style="height : auto;">
          <div class="modal-header" style="background-color: #507183;">
               <span style="font-size: 23px; font-family: monospace;"><b style="color: white;letter-spacing: 1.3px;"></b></span>
               <span class="close" data-dismiss="modal">&times;</span>
          </div>
          <div class="modal-body" style="background-color: #d6e1e9;">
           <form method="post" id="msg_form">

            <div class="col-sm-12" style="display: inline-flex;">
             <div class="col-sm-6">
               <input type="text" name="name" id="name" class="form-control" style="margin-bottom: 10px;" placeholder="Name...">
               <input type="hidden" name="id" id="id"/>
             </div>
              <div class="col-sm-6">
                <input type="text" name="email" id="email" class="form-control" style="margin-bottom: 10px;" placeholder="E-mail...">
              </div>
            </div>

            <div class="col-sm-12" style="display: inline-flex;">
             <div class="col-sm-6">
                <input type="text" name="contact" id="contact" class="form-control" style="margin-bottom: 10px;" placeholder="Contact...">
              </div>
             <div class="col-sm-6">
               <input type="text" name="qty" id="qty" class="form-control" style="margin-bottom: 10px;" placeholder="Quantity...">
             </div>
            </div>

            <div class="col-sm-12" style="display: inline-flex;">
                <textarea rows="4" cols="70" placeholder="Message..." class="form-control" style="margin-bottom: 10px;" name="msg" id="msg"></textarea>
            </div>
            <div class="col-sm-12">
                <button type="button" id="submit_msg" name="submit_msg"  onclick="SendMsg()" class="btn btn-primary" style="height: 35px; width: 100px; color: white; border-color: #2CA8FF; background-color: #2CA8FF; font-size: 16px; padding: 4px 10px; margin-top: 0px; margin-left: 1.5%;">Send</button>
            </div>
           </form>
          </div>
       </div>
      </div>
    </div>
  <div id="snackbar"><p id="msg_view"></p></div>
</div>
</body>
</html>