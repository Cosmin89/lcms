<?php

// Home

Breadcrumbs::register('home', function($breadcrumbs) {
    $breadcrumbs->push('home', route('home'));
});

Breadcrumbs::register('category', function($breadcrumbs, $category)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push($category->title, route('category.show', $category->title));
});

Breadcrumbs::register('post', function($breadcrumbs, $post) {
    $breadcrumbs->parent('category', $post->category);
    $breadcrumbs->push($post->title, route('post.show', $post->id));
});

