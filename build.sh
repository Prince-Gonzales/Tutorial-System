#!/bin/bash
set -e

echo "Starting build process..."

# Set environment variables for React build
export CI=false
export SKIP_PREFLIGHT_CHECK=true

# Install dependencies
echo "Installing dependencies..."
cd react-frontend

if ! npm install --legacy-peer-deps --no-audit --prefer-offline; then
    echo "Error: npm install failed"
    exit 1
fi

# Build React app
echo "Building React app..."
if ! CI=false npm run build; then
    echo "Error: React build failed"
    exit 1
fi

# Check if build directory exists
if [ ! -d "build" ]; then
    echo "Error: Build directory not found after build"
    exit 1
fi

# Verify build output
if [ ! -f "build/index.html" ]; then
    echo "Error: index.html not found in build directory"
    exit 1
fi

# Copy build files to public directory
echo "Copying build files to public directory..."
cd ..
mkdir -p public

# Copy React build files (this will overwrite existing files)
if ! cp -r react-frontend/build/. public/; then
    echo "Error: Failed to copy build files"
    exit 1
fi

# Verify copy was successful
if [ ! -f "public/index.html" ]; then
    echo "Error: index.html not found in public directory after copy"
    exit 1
fi

echo "Build completed successfully!"

