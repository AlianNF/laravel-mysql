#!/bin/bash

# Ejecutar migraciones y sembrar datos
php artisan migrate:fresh --seed --force

# Iniciar Apache
apache2-foreground