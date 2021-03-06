
<?php
    require_once("client-nav.php");
?>
<div class="bg-black pt-4">
    <div class="row pb-4">
        <div class="col-md"></div>
        <div class="col-md-8">
            <form action="<?php echo FRONT_ROOT. "Client/Filter"?>" method="GET">
                <div class="category-selector">
                    <label class="category-label" for="category">¿Qué te gustaría ver?</label>
                        <div class="form-group w-100">
                            <select class="form-control category-select" name="category" placeholder="genre">
                                <option disabled selected></option>
                                <?php foreach($genres as $genre){?>
                                    <option <?php if ($idGenre==$genre->getId()) echo "selected"; ?> value="<?php echo $genre->getId();?>" >
                                        <?php echo $genre->getName();?>
                                    </option>
                                <?php } ?>    
                            </select>
                        </div>
                    <div class="form-group">
                        <button  type="submit" class="btn btn-primary category-button">
                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>  
        <div class="col-md"></div>
    </div>
</div>
<?php
    require_once(CLIENT_PATH . "client-list-movies.php");
?>