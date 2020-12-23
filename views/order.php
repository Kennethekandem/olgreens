<section class="order">
    <div class="container">
        <div class="col-12 col-lg-6 big-header">
            <h1>Fill in your market list</h1>
        </div>

        <div class="col-12">
            <form action="" class="order_form">
                <div class="inputs">
                    <div class="form-group input-group">
                        <label for="exampleFormControlInput1" class="sr-only">Item</label>
                        <input type="text" class="form-control item_input" name="item[]" id="exampleFormControlInput1">
                        <div class="input-group-append">
                            <input type="number" class="input-group-text item_price" placeholder="₦" id="basic-addon2" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <button class="btn btn-primary add_item">&plus; Add</button>
                    </div>
                </div>
            </form>

            <div class="col-12 add_more_div">
                    <div class="row">
                        <!-- <div class="col-lg-6 col-12 add_more">
                            <button class="btn btn-primary add_item">&plus; Add</button>
                        </div> -->
                        <!-- <div class="col-lg-6 col-12 total">
                            <span class="form-inline" style="margin-bottom: 10px;">
                                <label for="inputPassword6"><b>Service Charge</b></label>
                                <input type="number" id="inputPassword6" class="form-control service_input" placeholder="₦1500" aria-describedby="passwordHelpInline" disabled>
                            </span>
                            <span class="form-inline">
                                <label for="inputPassword6"><b>TOTAL + Service Charge</b></label>
                                <input type="number" id="inputPassword6" class="form-control service_input total" placeholder="₦" aria-describedby="passwordHelpInline" disabled>
                            </span>
                        </div> -->

                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Item</th>
                                <th scope="col">Price</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="items">
                            </tbody>
                            <tfoot>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Total: <span class="total_footer"></span></td>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <!-- <div class="row">
                    <div class="col-lg-6 col-12 add_more">
                        <input type="file" class="btn btn-success add_item" />
                    </div>
                    <div class="col-lg-6 col-12 text-right">
                        <p class="text-danger">Note: Hello</p>
                    </div>
                </div> -->

                <div class="form-group">
                    <button class="btn btn-success confirm_list" data-toggle="modal" data-target="#exampleModal">Confirm List</button>
                    <button class="btn btn-success" disabled>Proceed to payment</button>
                </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="exampleModalLabel">Make Payment</h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <h4>Make payment to this account number</h4>

        <p class="text-green"><b>0273558780 Olgreens</b></p>

        <div class="row">
            <div class="col-lg-12 col-12 add_more">
                <input type="file" class="btn btn-success" id="imgInp" />
            </div>
            <div class="col-lg-12 col-12 justify_content_center">
                <img id="payment_image" src="" alt="your image" />
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
</section>
