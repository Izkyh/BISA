#!/bin/bash

# TIBA Surabaya - Installation Script
# This script automates the setup process

echo "======================================"
echo "TIBA Surabaya Website - Setup Script"
echo "======================================"
echo ""

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Check if composer is installed
if ! command -v composer &> /dev/null
then
    echo -e "${RED}Composer is not installed. Please install Composer first.${NC}"
    exit 1
fi

# Check if npm is installed
if ! command -v npm &> /dev/null
then
    echo -e "${RED}NPM is not installed. Please install Node.js and NPM first.${NC}"
    exit 1
fi

echo -e "${GREEN}✓ Prerequisites check passed${NC}"
echo ""

# Step 1: Install PHP dependencies
echo -e "${YELLOW}[1/9] Installing PHP dependencies...${NC}"
composer install
echo -e "${GREEN}✓ PHP dependencies installed${NC}"
echo ""

# Step 2: Install Node dependencies
echo -e "${YELLOW}[2/9] Installing Node dependencies...${NC}"
npm install
echo -e "${GREEN}✓ Node dependencies installed${NC}"
echo ""

# Step 3: Copy environment file
echo -e "${YELLOW}[3/9] Setting up environment file...${NC}"
if [ ! -f .env ]; then
    cp .env.example .env
    echo -e "${GREEN}✓ .env file created${NC}"
else
    echo -e "${YELLOW}⚠ .env file already exists, skipping...${NC}"
fi
echo ""

# Step 4: Generate application key
echo -e "${YELLOW}[4/9] Generating application key...${NC}"
php artisan key:generate
echo -e "${GREEN}✓ Application key generated${NC}"
echo ""

# Step 5: Create database (if SQLite)
echo -e "${YELLOW}[5/9] Setting up database...${NC}"
read -p "Are you using SQLite? (y/n): " use_sqlite
if [ "$use_sqlite" == "y" ]; then
    touch database/database.sqlite
    echo -e "${GREEN}✓ SQLite database file created${NC}"
else
    echo -e "${YELLOW}⚠ Please configure your database in .env file${NC}"
fi
echo ""

# Step 6: Run migrations
echo -e "${YELLOW}[6/9] Running database migrations...${NC}"
php artisan migrate
echo -e "${GREEN}✓ Database migrations completed${NC}"
echo ""

# Step 7: Create storage link
echo -e "${YELLOW}[7/9] Creating storage symbolic link...${NC}"
php artisan storage:link
echo -e "${GREEN}✓ Storage link created${NC}"
echo ""

# Step 8: Seed database (optional)
echo -e "${YELLOW}[8/9] Seeding database...${NC}"
read -p "Do you want to seed the database with sample data? (y/n): " seed_db
if [ "$seed_db" == "y" ]; then
    php artisan db:seed
    echo -e "${GREEN}✓ Database seeded successfully${NC}"
else
    echo -e "${YELLOW}⚠ Skipping database seeding${NC}"
fi
echo ""

# Step 9: Create Filament admin user
echo -e "${YELLOW}[9/9] Creating Filament admin user...${NC}"
read -p "Do you want to create an admin user now? (y/n): " create_admin
if [ "$create_admin" == "y" ]; then
    php artisan make:filament-user
    echo -e "${GREEN}✓ Admin user created${NC}"
else
    echo -e "${YELLOW}⚠ You can create admin user later with: php artisan make:filament-user${NC}"
fi
echo ""

# Compile assets
echo -e "${YELLOW}Compiling assets...${NC}"
npm run build
echo -e "${GREEN}✓ Assets compiled${NC}"
echo ""

# Final message
echo "======================================"
echo -e "${GREEN}Installation completed successfully!${NC}"
echo "======================================"
echo ""
echo "Next steps:"
echo "1. Configure your .env file (database, app settings, etc.)"
echo "2. Run 'php artisan serve' to start the development server"
echo "3. Access the website at: http://localhost:8000"
echo "4. Access admin panel at: http://localhost:8000/admin"
echo ""
echo "For development with hot reload, run: npm run dev"
echo ""
echo -e "${GREEN}Happy coding! 🚀${NC}"
