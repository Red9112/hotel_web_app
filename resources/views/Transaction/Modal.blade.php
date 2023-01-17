
<!-- Button to Open the Modal -->
<button  type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#myModal">
    <svg width="25" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
    viewBox="0 0 24 24" stroke="black">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
</svg>
  </button>
  
  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header alert alert-warning">
            
                <h5> Have any account ?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
   
  
        <!-- Modal body -->
        <div class="modal-body">
            <a href="{{route('transaction.createCustomer')}}" class="btn btn-info" id="ModalBtn">No, create new account!</a>
            <a href="{{route('transaction.chooseCustomer')}}" class="btn btn-info" id="ModalBtn">Yes, using an existing account!</a>
          <button></button>
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
  
      </div>
    </div>
  </div>