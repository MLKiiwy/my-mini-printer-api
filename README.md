My Mini printer api
==========================

# Installation

```bash
# Start Docker
docker-machine start default
eval "$(docker-machine env default)"

# Build image
docker-compose build

# Run image
docker-compose run web bash

# Install deps
composer install
```

# Generate entities

```bash
# Solve an issue
chmod +x /app/vendor/api-platform/schema-generator/bin/schema
# Generate entities
bin/schema generate-types src/AppBundle/Entity/ resources/data/entities-generator.yml
```

