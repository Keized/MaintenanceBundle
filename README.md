[![Build Status](https://travis-ci.org/Keized/maintenanceBundle.svg?branch=master)](https://travis-ci.org/Keized/maintenanceBundle)

# Installation

```
$ composer require keized/maintenance-bundle
```

# Command
### Enable Maintenance

```
$ php bin/console app:maintenance on
```

### Disable Maintenance

```
$ php bin/console app:maintenance off
```

# Configuration

Add the following following file in your config/services/packages folder
keized_maintenance.yaml

```
keized_maintenance:
    template: '%kernel.project_dir%/templates/maintenance-custom.html'
```
