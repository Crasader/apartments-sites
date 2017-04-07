@extends('layouts/dinapoli/main')
                        @section('page-title-row')
                        <div class="col-md-8">
                            <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">AMENITIES</h1>
                        </div>
                        @stop
                        @section('page-title-span','AMENITIES')
            @section('content')
            <!-- Amenities Section -->
            <section class="page-section pb-0" id="about">
                <div class="container relative">
                    <div class="row">
                    	<div class="col-sm-12">
                    		<h2 class="section-title font-alt align-left mb-20 mb-sm-20">
                               <?php echo $entity->getText('slogan'); ?>
                            </h2>
                    	</div>

                    </div>
                    <div class="row">
                    	<div class="col-sm-12 mb-60">
                    		
                    		<div class="text">
                    		<?php echo $entity->getText('amenities-welcome');?>
                    		</div>
                    	
                    	</div>
                    
                    </div>
                    <hr class="mb-40">
                    <div class="row">
                    	<div class="col-sm-12 mb-10">
                    		<h2 class="section-title font-alt align-left mb-20 mb-sm-20">Apartment Features</h2>
                    	</div>
                        <?php 
                            $rows = 2;
                            $features = app()->make('App\Property\Feature');
                            $features->setFeaturesLimit([
                                'apartment' => 8,
                                'community' => 24
                            ]);
                            $features->setFeaturesFormatter(new App\Util\Formatter('li'));
                            $features->setFeaturesChunkCount($rows);
                            $features->loadAllFeatures();
                            for($i=0;$i < $rows;$i++){
                        ?>
                    	<div class="col-md-6 mb-40">
                    		<div class="text">
                    			<ul style="list-style-type:none; line-height: 30px;">
                                    <?php echo $features->getFeaturesChunk('apartment',$i); ?>
                                </ul>
                    		</div>
                    	</div>
                        <?php
                            }   //End for
                        ?>
                    </div>
                    <hr class="mb-40">
                    <div class="row">
                    	<div class="col-sm-12 mb-10">
                    		<h2 class="section-title font-alt align-left mb-20 mb-sm-20">Community Features</h2>
                    	</div>
                        <?php
                            $rows = 3;
                            $features->setFeaturesChunkCount($rows);
                            for($i=0; $i < $rows;$i++){
                        ?>
                    	<div class="col-sm-4 mb-40">
                    		<div class="text">
                    			<ul style="list-style-type:none; line-height: 30px;">
                                    <?php 
                                        echo $features->getFeaturesChunk('community',$i);
                                    ?>
                                </ul>
                    		</div>
                    	</div>
                        <?php
                            }   //End for loop
                        ?>
                    </div>
                    <hr class="mb-40">
                    <?php //TODO: if other features exist... ?>
                    <div class="row">
                    	<div class="col-sm-12 mb-10">
                    		<h2 class="section-title font-alt align-left mb-20 mb-sm-20">Other Features & Services</h2>
                    	</div>
                        <?php
                            $rows = 2;
                            $features->setFeaturesChunkCount($rows);
                            for($i=0;$i < $rows;$i++){
                        ?>
                                <div class="col-sm-4 mb-40">
                                    <div class="text">
                                        <ul style="list-style-type:none; line-height: 30px;">
                                            <?php echo $features->getFeaturesChunk('other',$i); ?>
                                        </ul>
                                    </div>
                                </div>
                        <?php
                            }   //End for
                        ?>
                    </div>
                </div>
            </section>
            <!-- End Amenities Section -->
           @stop
