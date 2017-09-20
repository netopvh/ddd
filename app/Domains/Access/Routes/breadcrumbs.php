<?php


/**
 * Usuários
 */
Breadcrumbs::register('admin.users', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.home');
    $breadcrumbs->push('Usuários', route('admin.users'));
});

Breadcrumbs::register('admin.users.add', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.users');
    $breadcrumbs->push('Novo', route('admin.users.create'));
});

/**
 * Roles
 */
Breadcrumbs::register('admin.roles', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.home');
    $breadcrumbs->push('Perfis de Acesso', route('admin.roles'));
});

/**
 * Permissions
 */
Breadcrumbs::register('admin.permissions', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.home');
    $breadcrumbs->push('Permissões', route('admin.permissions'));
});