<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package auaha
 */

get_header(); ?>

<?php if (have_posts()) : the_post(); ?>
    <div class="wrapper">
        <a href="/artigos" class="link__return">voltar para <strong>artigos e notícias</strong></a>

        <h1 class="single__title"><?php the_title(); ?></h1>
        <div class="add__date"><span class="artigos__data"><?php $post_date = get_the_date( 'd/m/Y' ); echo $post_date; ?></span><div class="addthis_inline_share_toolbox"></div></div>
        <div class="content__post"><?php the_content(); ?></div>

        <span class="title__page">comentários</span>
        <div class="comentarios__forma">
            <?php get_template_part( 'comment' ); ?>
            <!-- <?php
                $postID = $post->ID;
                $comment_array = get_approved_comments($postID);
                foreach ($comment_array as $comment) {
                    echo('<p class="coments-p">
                    <span class="comentario-autor">
                    <span class="autor-coment">' . $comment->comment_author . '</span>
                    <span class="date-coment">' . date('j-m-Y', strtotime($comment->comment_date)) . '</span> 
                    </span>
                    <span class="comentario-autor_text">' . $comment->comment_content . '</span></p>');
                }
            ?> -->
        </div>
    </div>

    
 

<?php  endif; ?>

<?php get_footer(); ?>
