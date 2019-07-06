<div class="blogpostcategory">

   <a class="overdefultlink" href="<?php the_permalink(); ?>"/>
      <div class="overdefult">
      </div>
   </a>

   <div class="blogimage" style="float:left;margin-right:20px;">
      <div class="loading"></div>
      <a href="<?php the_permalink(); ?>">
      <?php
         if ( has_post_thumbnail() ) {
             the_post_thumbnail(array(300,200));
         }
         ?>
      </a>    
   </div>

   <div class="entry grid" >
      <div class="meta">
         <div class="blogContent" style="margin-top:0px;margin-bottom:30px;">
            <div class="topBlog">
               <div class="blog-category"><?php echo '<em>' . get_the_category_list( esc_html__( ', ', 'amory' ) ) . '</em>'; ?> </div>
               <h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
               <?php if(amory_globals('display_post_meta')) { ?>
					<div class = "post-meta">
						<?php 
						$day = get_the_time('d');
						$month= get_the_time('m');
						$year= get_the_time('Y');
						?>
						<?php echo '<a class="post-meta-time" href="'.get_day_link( $year, $month, $day ).'">'; ?><?php the_time('F j, Y') ?></a> <a class="post-meta-author" href="<?php echo  the_author_meta( 'user_url' ) ?>"><?php esc_html_e('by ','amory'); echo get_the_author(); ?></a> <a href="<?php echo the_permalink() ?>#commentform"><?php comments_number(); ?></a>				
					</div>
					<?php } ?> <!-- end of post meta -->
            </div>
            <div class="blogcontent" style="margin-top:0px;margin-bottom:30px;"><?php the_excerpt(); ?></div>
            <?php if(amory_globals('display_post_meta')) { ?>
			
				<div class="bottomBlog" style="margin-top:2px;position:relative;float:left;width:100%;">
			
					<?php if(amory_globals('display_socials')) { ?>
					
					<div class="blog_social" style="float:right;"> <?php esc_html_e('Share: ','amory') . amory_socialLinkSingle(get_the_permalink(),get_the_title())  ?></div>
					<?php } ?>
					
					 <!-- end of socials -->
					
					<?php if(amory_globals('display_reading')) { ?>
					<div class="blog_time_read">
						<?php echo esc_html__('Reading time: ','amory') . esc_attr(amory_estimated_reading_time(get_the_ID())) . esc_html__(' min','amory') ; ?>
					</div>
					<?php } ?>
					<!-- end of reading -->
					
				</div> 
		
		<?php } ?> <!-- end of bottom blog -->
            <!-- end of bottom blog -->
         </div>
      </div>
   </div>

</div>