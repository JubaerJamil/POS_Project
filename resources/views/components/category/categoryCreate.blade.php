<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Create Category</h6>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Category Name *</label>
                                <input type="text" class="form-control" id="categoryName">
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="Save()" id="save-btn" class="btn btn-sm  btn-success" >Save</button>
                </div>
            </div>
    </div>
</div>


<script>

    async function Save() {
        let categoryName = document.getElementById('categoryName').value;
        if (categoryName.length === 0) {
            alert('Please input a category');
        }
        else {
            document.getElementById('modal-close').click();
             // loader show, content hide
        document.getElementById('loading-div').classList.remove('d-none');
        document.getElementById('content-div').classList.add('d-none');
            let res = await axios.post("/create-category",{name:categoryName})
        // loader hide, content show
        document.getElementById('loading-div').classList.add('d-none');
        document.getElementById('content-div').classList.remove('d-none');
            if(res.status===201){
                alert('Added successfully');
                document.getElementById("save-form").reset();
                await getList();
            }
            else{
                alert('Request failed');
            }
        }
    }

</script>
