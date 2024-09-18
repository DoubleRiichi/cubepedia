


<div class="row">
    <div class="col">
        <form action="/wiki" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="row">
                <div class="col">
                <label for="article-title">Article Title</label>
                <input class="form-control mb-3" name="article_title" type="text" >
                <textarea rows="20" class="form-control mb-3" autocomplete="off" name="intro" id=""></textarea>
                <input type="file" name="article_image" id="">
                <input hidden type="text" id="sections_count" name="sections_count" value="0" autocomplete="off">        
                </div>
            </div>  

            <div id="sections">
            
            </div>
            <button class="btn btn-success" type="button" id="add-section" onclick="add_section()">Add Section</button>

            <button class="btn btn-success" type="submit">Submit</button>
        </form>
    </div>
</div>


<script src="{{asset("src/articleForm.js")}}"></script>
