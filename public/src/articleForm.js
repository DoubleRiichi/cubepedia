{
    let counter = null;
    
    function section(id) {
        return `
        <div class="row mt-4">
            <div class="col py-3">
                <h2>Section ${id}</h2>
                <div id="section-${id}">
                <label for="section_title_${id}">Title</label>
                <input class="form-control" name="section_title_${id}" type="text" >
                <label for="section_text_${id}">Text</label>

                <textarea class="form-control mb-3" rows=25 name="section_text_${id}" id=""></textarea>
                <button type="button" class="btn btn-success" id="add_image_${id}" onclick="add_image(${id})">Add image</button>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <div id="image_area_${id}">

                </div>
                <input type="text" name="image_count_${id}" id="image_count_${id}" value="0" hidden>
            </div>
        </div>
        <hr />
        `
    }


    function add_image(id) {
        let image_area = document.getElementById("image_area_" + id);
        let image_count = document.getElementById("image_count_" + id);
        image_count.setAttribute("value",  (parseInt(image_count.value) + 1).toString());

        if(parseInt(image_count.value) < 5) {
            image_area.insertAdjacentHTML("beforeend", `<input class="form-control" type="file" name="image_${id}_${image_count.value}">`);
        }
        
    }   

    function add_section() {
        let sectionspace = document.getElementById("sections");
        let counter = document.getElementById("sections_count");

        let section_id = parseInt(counter.value) + 1;
        counter.setAttribute("value", section_id.toString());
        
        sectionspace.insertAdjacentHTML("beforeend", section(section_id));
    }
}