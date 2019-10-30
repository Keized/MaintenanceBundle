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
$ php bin/console app:maintenance on
```

# Configuration

Add the following following file in your config/services/packages folder
keized_maintenance.yaml

```
keized_maintenance:
    template: '/template/maintenance-custom.html'
```
