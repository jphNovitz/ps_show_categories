<!-- Block mymodule -->
<div id="categories_block_home" class="block container">
    {*<h3>title here</h3>*}
    <div class="block_content row">
        {foreach $categories as $category}
            {assign var="dir" value=$smarty.current_dir}
            {if  file_exists("$dir/../../img/c/"|cat:$category['id_category']|cat:".jpg")}
                {assign var="imageFile" value="img/c/"|cat:$category['id_category']|cat:".jpg"}
                {*<img src="../../img/c/{$category['id_category']}.jpg" />*}
            {else}
                {assign var="imageFile" value="modules/pdw_categories/views/404.png"}
                {*{html_image file="modules/pdw_categories/views/404.png" }*}
            {/if}
            <div class="col-md-4 item"
                 style="background-image: url({$imageFile}) ;"
                    {*style="background-image: url({$imageFile}) ;*}
                    {*background-size: 100% 100% ;*}
                    {*background-repeat: no-repeat;*}
                    {*height: 8rem ;*}
                    {*max-height: 8rem ;*}
                    {*margin: 0;*}
                    {*border: solid 1px #fff"*}
            >
                {*{$imageFile}*}
                <h4 class="category_name"> {$category['name']} </h4>
            </div>


        {/foreach}

    </div>
</div>
<!-- /Block mymodule -->