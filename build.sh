#!/bin/bash
set -e

echo "Installing dependencies..."
cd react-frontend
npm install --legacy-peer-deps

echo "Building React app..."
npm run build

echo "Copying build files to public directory..."
cd ..
mkdir -p public
cp -r react-frontend/build/. public/

echo "Build completed successfully!"

