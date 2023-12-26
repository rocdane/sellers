<div class="submit-ad main-grid-border">
    <h1>Edit order</h1>
    <div class="post-ad-form" id="">
        <form class="add-post-form" enctype="multipart/form-data" method="POST" action="/post">
            @csrf
            <span class="error" style=""> </span>
            <div class="clearfix"></div>
            <label>Titre <span>*</span></label>
            <input type="text" class="title form-control" placeholder="">
            <div class="clearfix"></div>
            <label>Description <span>*</span></label>
            <textarea style="width: 100%; height: 250px;" class="description form-control" placeholder="Décrivez l'offre"></textarea>
            <div class="clearfix"></div>
            <div class="upload-ad-photos">
            <label>Choisissez une photo : <span>*</span></label>
                <div class="photos-upload-view">
                    <div><input class="form-control fileselect" type="file" id="fileselect" name="fileselect[]"/></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
                <p class="post-terms">En cliquant <strong>Poster</strong> Vous acceptez nos <a href="terms.html" target="_blank">règles </a> et <a href="privacy.html" target="_blank">politiques de confidentialité</a></p>
            <div class="col-12">
                <button type="submit" class="btn btn-main ">Poster</button>
            </div>
            <div class="clearfix"></div>
        </form>
    </div>
</div>