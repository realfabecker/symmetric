# syntax=docker/dockerfile:1.3-labs
FROM php:7.1.33-cli as base

# registering node source
RUN <<EOF
  apt-get update
  apt-get install -y ca-certificates curl gnupg
  mkdir -p /etc/apt/keyrings
  curl -fsSL https://deb.nodesource.com/gpgkey/nodesource-repo.gpg.key | gpg --dearmor -o /etc/apt/keyrings/nodesource.gpg
  echo "deb [signed-by=/etc/apt/keyrings/nodesource.gpg] https://deb.nodesource.com/node_20.x nodistro main" | tee /etc/apt/sources.list.d/nodesource.list
  apt-get update && apt-get install nodejs -y
EOF

COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer