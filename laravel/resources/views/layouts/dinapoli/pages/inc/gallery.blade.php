                    <!-- Gallery Filter -->                    
                    <div class="works-filter font-alt align-center">
                        <a href="#" class="filter active" data-filter="*">All</a>
                        <?php 
                        //TODO: load items and filters dynamically by entity
                            $gallery = app()->make('App\Property\Gallery');
                            $gallery->setFilters(['community','main']);
                            foreach(['community' => 'Community','main'=>'Apartment'] as $type => $label):
                        ?>
                        <a href="#<?php echo $type;?>" class="filter" data-filter=".<?php echo $type;?>"><?php echo $label;?></a>
                        <?php
                            endforeach;
                        ?>
                    </div>                    
                    <!-- End Gallery Filter -->
                    
                    <!-- Gallery Grid -->
                    <ul class="works-grid work-grid-3 work-grid-gut clearfix font-alt hover-white hide-titles" id="work-grid">
                        <?php 
                        //TODO: load items and filters dynamically by entity
                            $gallery->loadItems(['community','main']);
                            foreach($gallery->fetchSortedItems($gallery::SORT_TYPE_SPARSE) as $index => $imageData):
                        ?>
                        <!-- Gallery Item (Lightbox) :) -->
                        <li class="work-item mix <?php echo $imageData['_itemName_'] ?? "";?>">
                            <a href="<?php echo $imageData['image'] ?? "";?>" class="work-lightbox-link mfp-image">
                                <div class="work-img">
                                    <?php //TODO: create migration to add 'alt' 'description' 'title' fields to property_photo ?>
                                    <img src="<?php echo $imageData['image'] ?? "";?>" alt="<?php echo $imageData['alt'] ?? "Work" ;?>" />
                                </div>
                                <div class="work-intro">
                                    <h3 class="work-title"><?php echo $imageData['title'] ?? $imageData['_itemName_'];?></h3>
                                    <div class="work-descr">
                                        <?php echo $imageData['desc'] ?? "Lorem ipsum dolor sit amet";?>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- End Gallery Item -->
                        <?php endforeach; ?>
                    </ul>
                    <!-- End Gallery Grid -->
