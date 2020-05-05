<div class="container">
    <div class="d-flex justify-content-between">
        <button id="reload" type="button" class="btn btn btn btn-outline-primary border border-dark">Back to Add post or
            category /
            Reload page
        </button>

        <button onclick="getThreeEntries('getThreeEntries')" type="button"
                class="btn btn btn-outline-secondary border border-dark">Get last 3 entries
        </button>

        <button onclick="getAllCategory('getAllCategory')" type="button" class="btn btn-dark">Get table
            category
        </button>
    </div>

    <hr>

    <div class="row">
        <div class="col-lg-7 col-md-7 col-sm-7">

            <h4 class="text-center" id="createEditPost">Create post</h4>
            <form enctype="multipart/form-data" class="p-1 border border-dark rounded">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title">
                </div>
                <div class="form-group">
                    <label for="summary">Summary:</label>
                    <textarea class="form-control" id="summary"></textarea>
                </div>
                <div class="form-group">
                    <label for="article">Article:</label>
                    <textarea id="article" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="cat">Category:</label>
                    <input type="text" class="form-control" id="cat" list="category-id">
                    <datalist id="category-id"></datalist>
                </div>
                <div class="form-group">
                    <label for="tag">Tags:</label>
                    <input type="text" class="form-control" id="tag" placeholder="simple care, sharp claws, flexible">
                    <small class="form-text text-muted">All tags with a small letter - separated by commas</small>
                </div>
                <div class="form-group">
                    <label for="image">Photo:</label>
                    <input type="file" class="btn btn-secondary" id="image">
                </div>
                <div class="text-right">
                    <input type="submit" value="Add post" class="btn btn-success border border-dark float-right"
                           id="addPost">

                    <input type="submit" value="Edit post"
                           class="btn btn-warning d-none border border-dark float-left" id="editPost">
                    <div class="float-cleaner"></div>
                </div>
            </form>
        </div>

        <div class="col-lg-5 col-md-5 col-sm-5">
            <h4 class="text-center">Category</h4>
            <form class="bg-dark p-1 border border-dark rounded">
                <h3 id="textEdit" class="text-center text-white"></h3>
                <div class="form-group">
                    <label for="category" class="text-white">Title category:</label>
                    <input type="text" id="category" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description" class="text-white">Description category:</label>
                    <input type="text" id="description" class="form-control">
                </div>
                <div>
                    <input type="submit" value="Add Category" class="btn btn-primary border border-dark float-right"
                           id="addCategory">

                    <input type="submit" value="Edit Category"
                           class="btn btn-warning d-none border border-dark float-left" id="editCategory">
                    <div class="float-cleaner"></div>
                </div>
            </form>

        </div>


    </div>


</div>
<div id="insert" class="container"></div>


<script src="/js/cats-category.js"></script>
<script src="/js/cats-post.js"></script>

<script>


</script>