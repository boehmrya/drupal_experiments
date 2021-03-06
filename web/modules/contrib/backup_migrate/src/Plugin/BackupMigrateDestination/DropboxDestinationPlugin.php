<?php

namespace Drupal\backup_migrate\Plugin\BackupMigrateDestination;

use BackupMigrate\Drupal\EntityPlugins\DestinationPluginBase;

/**
 * Defines a file directory destination plugin.
 *
 * @BackupMigrateDestinationPlugin(
 *   id = "dropbox_destination",
 *   title = @Translation("Dropbox Directory"),
 *   description = @Translation("Back up to a Dropbox."),
 *   wrapped_class = "\BackupMigrate\Drupal\Destination\DrupalDropboxDestination"
 * )
 */
class DropboxDestinationPlugin extends DestinationPluginBase {}
