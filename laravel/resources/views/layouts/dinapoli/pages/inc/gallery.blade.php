<?php
use App\System\Session as Sesh;
?>

                    <!-- Gallery Filter -->
                    <div class="works-filter font-alt align-center">
                        <a href="#" class="filter active" data-filter="*">All</a>
                        <?php
                        //TODO: load items and filters dynamically by entity
                            if(isset($galleryOptions)){
                                $sections = $galleryOptions['sections'];
                                $filters = $galleryOptions['filters'];
                            }else{
                                $sections = ['community' => 'Community','main' => 'Apartment'];
                                $filters = ['community','main'];
                            }
                            $gallery = app()->make('App\Property\Gallery');
                            $gallery->setFilters($filters);
                            foreach($sections as $type => $label):
                        ?>
                        <a href="#<?php echo $type;?>" class="filter" data-filter=".<?php echo $type;?>"><?php echo $label;?></a>
                        <?php
                            endforeach;
                        ?>
                    </div>
                    <!-- End Gallery Filter -->

                    <!-- Gallery Grid -->
                    <?php if(!Sesh::isCmsUser()): ?>
                      <ul class="works-grid work-grid-3 work-grid-gut clearfix font-alt hover-white hide-titles" id="work-grid">
                    <?php else :?>
                      <div class="works-grid work-grid-3 work-grid-gut clearfix font-alt hover-white hide-titles" id="work-grid">
                    <?php endif; ?>
                        <?php
                        //TODO: load items and filters dynamically by entity
                            $gallery->loadItems(['community','main']);
                            foreach($gallery->fetchSortedItems($gallery::SORT_TYPE_SPARSE) as $index => $imageData):
                                       if(isset($displayOptions['gallery-intro-sections'])){
                                                if($imageData['_itemName_'] == 'main'){
                                                    $section =  $displayOptions['gallery-intro-sections']['apartment'];
                                                }else{
                                                    $section = $displayOptions['gallery-intro-sections']['community'];
                                                }
                                        }else{
                                            $section = ($imageData['_itemName_'] == 'main') ? "Apartment" : "Community";
                                        }
                        ?>
                        <?php if(!Sesh::isCmsUser()): ?>
                        <!-- Gallery Item (Lightbox) :) -->
                        <li class="work-item mix <?php if($imageData['_itemName_']) echo $imageData['_itemName_']; ?>">
                            <a href="<?php echo $imageData['image'] ?? "";?>" class="work-lightbox-link mfp-image">
                                <div class="work-img">
                                    <?php //TODO: create migration to add 'alt' 'description' 'title' fields to property_photo ?>
                                    <img src="<?php echo $imageData['image'] ?? "";?>" alt="<?php echo $imageData['name'] ?? "Apartments for rent" ;?>" title="<?php echo $imageData['name'] ?? "Apartments for rent";?>" />
                                </div>
                                <div class="work-intro">
                                                <h3 class="work-title"><?php echo $section;?></h3>
                                    <div class="work-descr">
                                        <?php echo $imageData['name'] ?? "Lorem ipsum dolor sit amet";?>
                                    </div>
                                </div>
                            </a>
                          <?php else: ?>
                              <img id='foo_<?php echo $imageData['id'];?>' class='work-item' src="<?php echo $imageData['image'] ?? "";?>" alt="<?php echo $imageData['name'] ?? "Apartments for rent" ;?>" title="<?php $imageData['name'] ?? "Apartments for rent";?>" />
                          <?php endif; ?>
                        <?php if(Sesh::isCmsUser() == false): ?>
                          </li>
                        <?php endif; ?>
                        <!-- End Gallery Item -->
                        <?php if(isset($galleryLimit)){ if(--$galleryLimit == 0){ break; } }?>
                        <?php endforeach; ?>
                    <?php if(!Sesh::isCmsUser()): ?>
                        </ul>
                    <?php else: ?>
                        </div>
                    <?php endif; ?>
                  <!-- End Gallery Grid -->
