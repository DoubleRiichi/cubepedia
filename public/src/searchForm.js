
function userSearch() {

    return `
    <label for="username">Username : </label>
    <input class="form-control" type="text" name="username">
    
    <label for="dateBefore">Registered before :</label>
    <input class="form-control" type="date" name="dateBefore">
    
    <label for="dateAfter">Registered after :</label>
    <input class="form-control" type="date" name="dateAfter">
    
    <select class="form-select" name="status">
        <option value="none" selected>Select a role :</option>
        <option value="user">User</option>
        <option value="editor">Editor</option>
        <option value="banned">Banned</option>
        <option value="admin">Admin</option>
    </select>

    `
}


function logSearch() {

    return `
  

    <label for="dateOn">On :</label>
    <input class="form-control" type="date" name="dateOn">   

    <label for="dateBefore">Before :</label>
    <input class="form-control" type="date" name="dateBefore">
    
    <label for="dateAfter">After :</label>
    <input class="form-control" type="date" name="dateAfter">

    <label for="action">Action : </label>
    <select class="form-select" name="action">
        <option value="none" selected>Select an action</option>
        <option value="ban">Ban</option>
        <option value="unban">Unban</option>
        <option value="lock">Lock</option>
        <option value="unlock">Unlock</option>
        <option value="revert">Revert</option>
    </select>
    `
}

function CommentSearch() {

    return `
    <label for="comment">Content : </label>
    <input class="form-control" type="text" name="comment" id="">

    <label for="dateOn">On :</label>
    <input class="form-control" type="date" name="dateOn">   

    <label for="dateBefore">Before :</label>
    <input class="form-control" type="date" name="dateBefore">
    
    <label for="dateAfter">After :</label>
    <input class="form-control" type="date" name="dateAfter">
    `
}

function ArticleSearch() {

    return `
    <label for="title">Title : </label>
    <input class="form-control" type="text" name="title" id="">

    <label for="dateOn">On :</label>
    <input class="form-control" type="date" name="dateOn">   

    <label for="dateBefore">Before :</label>
    <input class="form-control" type="date" name="dateBefore">
    
    <label for="dateAfter">After :</label>
    <input class="form-control" type="date" name="dateAfter">
    `
}




function updateForm() {
    let searchOptions = document.getElementById("searchOption");
    let selected = searchOptions.value;
    let updateArea= document.getElementById("adaptableSearchForm");
    
    if(updateArea.hasChildNodes()) {
        updateArea.innerHTML = "";
    }

    switch (selected) {
        case "none":
            return;
        case "user":
            updateArea.innerHTML = userSearch();
            break;
        case "moderation_history":
            updateArea.innerHTML = logSearch();
            break;
        case "comment":
            updateArea.innerHTML = CommentSearch();
            break;
        case "article":
            updateArea.innerHTML = ArticleSearch();
            break;
        default:
            break;
    }
    
}
