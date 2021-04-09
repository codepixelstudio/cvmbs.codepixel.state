<?php

    $lab_options = get_field( 'lab_homepage_options' );
    $lab_staff   = $lab_options[ 'lab_staff' ];

?>

<!-- container -->
<section id="staff" class="laboratory-content template-block contact-group">

    <div class="template-block__inner">

        <h2>People</h2>

        <div class="group-bios__grid">

            <?php foreach ( $lab_staff as $staff ) :

            $staff_name  = $staff[ 'name' ];
            $staff_photo = $staff[ 'photo' ];
            $staff_desc  = $staff[ 'description' ];
            $staff_phone = $staff[ 'phones' ];
            $staff_link  = $staff[ 'directory_link' ];
            $staff_email = $staff[ 'email' ]; ?>

    		<div class="group-bios__grid-item">

                <div class="group-bios__image">

                    <?php if ( $staff_link ) : ?>

                    <!-- directory link -->
                    <a href="<?php echo $staff_link; ?>">

                        <?php echo wp_get_attachment_image( $staff[ 'photo' ], 'thumbnail' ); ?>

                    </a>
                    <!-- END directory link -->

                    <?php else : ?>

                    <?php echo wp_get_attachment_image( $staff[ 'photo' ], 'thumbnail' ); ?>

                    <?php endif; ?>

                </div>

    			<div class="group-bios__details">

                    <?php if ( $staff_link ) : ?>

                    <!-- directory link -->
                    <a class="group-bios__name" href="<?php echo $staff_link; ?>">

                        <?php echo $staff_name; ?>

                    </a>
                    <!-- END directory link -->

                    <?php else : ?>

                    <!-- directory link -->
                    <span class="group-bios__name" href="<?php echo $staff_link; ?>">

                        <?php echo $staff_name; ?>

                    </span>
                    <!-- END directory link -->

                    <?php endif; ?>

    				<div class="group-bios__desc">

                        <?php echo $staff_desc; ?>

                    </div>

    				<div class="group-bios__contact">

                        <?php foreach ( $staff_phone as $phone ) :

                        $phone_type = $phone[ 'type' ];
                        $phone_number = $phone[ 'number' ]; ?>

    					<p>

    						<span class="group-bios__contact-detail"><?php echo $phone_type; ?></span>:

    						<?php echo $phone_number; ?>

    					</p>

                        <?php endforeach; ?>

    					<p>

                            <a href="mailto:<?php echo $staff_email; ?>"><?php echo $staff_email; ?></a>

                        </p>

    				</div>

    			</div>

            </div>

            <?php endforeach; ?>

    	</div>

    </div>

</section>
<!-- END container -->
