<div class="modal fade editCountry" id="editCountry" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Country</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <form action="<?= route('update.country.details') ?>" method="post" id="update-country-form">
                    @csrf
                     <input type="hidden" name="cid">
                     <div class="form-group">
                         <label for="">Country name</label>
                         <input type="text" class="form-control" name="country_name" placeholder="Enter country name">
                     </div>
                     <div class="form-group">
                         <label for="">Country code</label>
                         <input type="text" class="form-control" name="country_code" placeholder="Enter country code">
                     </div>
                     <div class="form-group">
                         <label for="">Country Image</label>
                         <input type="file" class="form-control" name="country_image">

                     </div>
                     <div class="form-group">
                         <img src="" id="oldimage" width="50px" height="50px" srcset="" alt="loading">
                     </div>
                     <div class="form-group">
                         <button type="submit" class="btn btn-block btn-success">Save Changes</button>
                     </div>
                 </form>


            </div>
        </div>
    </div>
</div>
