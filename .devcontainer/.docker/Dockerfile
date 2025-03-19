FROM debian:bookworm-slim

# Avoid warnings by switching to noninteractive
ENV DEBIAN_FRONTEND=noninteractive

# Configure apt and install required packages
RUN apt-get update \
    && apt-get -y install --no-install-recommends \
       apt-transport-https \
       apt-utils \
       build-essential \
       ca-certificates \
       curl \
       git \
       gnupg2 \
       htop \
       iftop \
       locales \
       lsb-release \
       mariadb-client \
       nano \
       net-tools \
       procps \
       unzip \
       wget \
    #
    # Add Sury repository and install PHP
    && curl -fsSL https://packages.sury.org/php/apt.gpg | gpg --dearmor -o /usr/share/keyrings/sury-php.gpg \
    && echo "deb [signed-by=/usr/share/keyrings/sury-php.gpg] https://packages.sury.org/php/ $(lsb_release -sc) main" | tee /etc/apt/sources.list.d/php.list \
    && apt-get update \
    && apt-get install -y php8.3 php8.3-cli php8.3-common php8.3-curl \
       php8.3-intl php8.3-mbstring php8.3-mysql php8.3-opcache \
       php8.3-readline php8.3-xml php8.3-zip supervisor \
    #
    # Install Apache2 and enable required modules
    && apt-get -y install apache2 libapache2-mod-php8.3 \
    && a2enmod headers rewrite \
    && sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf \
    #
    # Reconfigure locales
    && locale-gen en_US.UTF-8 && dpkg-reconfigure --frontend=noninteractive locales \
    #
    # Clean up
    && apt-get autoremove -y && apt-get autoclean -y && apt-get clean -y \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Set environment variables
ENV DEBIAN_FRONTEND=dialog
ENV TZ=UTC
VOLUME /var/www/html

# Copy entrypoint script
COPY entrypoint.sh /
ENTRYPOINT ["/entrypoint.sh"]
