<div class="row">
    <div class="col">
        <form action="/admin/search" method="post" id="searchForm">
            @csrf
            <div class="row mb-4">
                <div class="col">
                    <label for="kind">Type :</label>
                    <select class="form-select" name="kind" id="searchOption" onchange="updateForm()">
                        <option value="none" selected>Select data to search</option>
                        <option value="user">Users</option>
                        @if (Auth::check() && Auth::user()->status == "admin")
                        <option value="moderation_history">Moderation Log</option>                        
                        @endif
                        <option value="comment">Comments</option>
                        <option value="article">Articles</option>
                    </select>
                </div>   
            </div>
            <div class="row">
                <div class="col py-4">
                    <div id="adaptableSearchForm">

                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col">
                    <button class="btn btn-success" type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="{{asset("/src/searchForm.js")}}"></script>