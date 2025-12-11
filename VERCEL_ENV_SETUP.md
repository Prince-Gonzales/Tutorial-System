# Vercel Environment Variables Setup

To connect your Laravel application to Neon PostgreSQL database, you need to set the following environment variables in your Vercel project settings:

## Required Environment Variables

Go to your Vercel project → Settings → Environment Variables and add:

1. **DB_CONNECTION** = `pgsql`
2. **DB_HOST** = `ep-floral-sound-a16f2ih8-pooler.a-southeast-1.aws.neon.tech`
3. **DB_PORT** = `5432`
4. **DB_DATABASE** = `neondb`
5. **DB_USERNAME** = `neondb_owner`
6. **DB_PASSWORD** = `npg_wKRslX9ck2af`
7. **DB_SSLMODE** = `require`

## Alternative: Using DATABASE_URL

You can also use a single DATABASE_URL environment variable:

```
DATABASE_URL=postgresql://neondb_owner:npg_wKRslX9ck2af@ep-floral-sound-a16f2ih8-pooler.a-southeast-1.aws.neon.tech:5432/neondb?sslmode=require
```

## Additional Laravel Environment Variables

Also make sure to set:

- **APP_KEY** - Generate with `php artisan key:generate`
- **APP_ENV** = `production`
- **APP_DEBUG** = `false`

## How to Set Environment Variables in Vercel

1. Go to your Vercel dashboard
2. Select your project
3. Go to Settings → Environment Variables
4. Add each variable above
5. Make sure to select "Production", "Preview", and "Development" environments
6. Redeploy your application

After setting these variables, redeploy your application for the changes to take effect.

