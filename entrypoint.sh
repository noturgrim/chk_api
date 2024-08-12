#!/bin/bash
# Custom entrypoint script to handle signals and start Apache

# Start Apache in the background
apache2-foreground &

# Wait indefinitely to prevent Docker from sending signals to Apache
wait -n
