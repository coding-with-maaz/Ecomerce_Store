# Product Filtering & Sorting Guide

## Overview
The product pages now have fully functional filtering and sorting capabilities that work automatically when users interact with the controls.

## Features Implemented

### 1. Price Range Filtering
Users can filter products by price ranges by checking/unchecking checkboxes:
- **Under Rs.2,000** - Shows products priced below Rs.2,000
- **Rs.2,000 - Rs.4,000** - Shows products priced between Rs.2,000 and Rs.4,000
- **Above Rs.4,000** - Shows products priced above Rs.4,000

**How it works:**
- Multiple price ranges can be selected simultaneously
- Results update automatically when a checkbox is checked or unchecked
- The filter considers sale prices when available, otherwise uses regular price
- Selected filters persist when navigating pages or sorting

### 2. Sorting Options
Users can sort products using the dropdown menu:
- **Latest** - Shows newest products first (default)
- **Price: Low to High** - Sorts by ascending price
- **Price: High to Low** - Sorts by descending price
- **Name: A to Z** - Sorts alphabetically by product name

**How it works:**
- Changes apply immediately when a new option is selected
- Current sort option is remembered when applying filters
- Sort considers sale prices when available

### 3. Pages with Filtering

#### Products Index (`/products`)
- Full filtering and sorting functionality
- Shows all products with applied filters
- Category sidebar for quick navigation

#### Category Page (`/products/category/{slug}`)
- Filtering and sorting within specific category
- Active category highlighted in sidebar
- Shows category description and image

#### Search Results (`/products/search`)
- Sorting functionality on search results
- Maintains search query when sorting
- Shows helpful suggestions when no results found

## Technical Implementation

### Backend (ProductController.php)

#### Price Filtering Logic
```php
private function applyPriceFilter($query, Request $request)
{
    $priceRanges = $request->input('price', []);

    if (!empty($priceRanges)) {
        $query->where(function($q) use ($priceRanges) {
            foreach ($priceRanges as $range) {
                if ($range == 'under-2000') {
                    $q->orWhereRaw('COALESCE(sale_price, price) < 2000');
                } elseif ($range == '2000-4000') {
                    $q->orWhereRaw('COALESCE(sale_price, price) BETWEEN 2000 AND 4000');
                } elseif ($range == 'above-4000') {
                    $q->orWhereRaw('COALESCE(sale_price, price) > 4000');
                }
            }
        });
    }

    return $query;
}
```

#### Sorting Logic
```php
private function applySorting($query, Request $request)
{
    $sort = $request->input('sort', 'latest');

    switch ($sort) {
        case 'price-low':
            $query->orderByRaw('COALESCE(sale_price, price) ASC');
            break;
        case 'price-high':
            $query->orderByRaw('COALESCE(sale_price, price) DESC');
            break;
        case 'name':
            $query->orderBy('name', 'ASC');
            break;
        case 'latest':
        default:
            $query->latest();
            break;
    }

    return $query;
}
```

### Frontend (JavaScript)

#### Auto-Submit on Filter Change
```javascript
// Handle price filter changes
document.querySelectorAll('.price-filter').forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        applyFilters();
    });
});

// Handle sort changes
document.getElementById('sortSelect').addEventListener('change', function() {
    applyFilters();
});

function applyFilters() {
    const url = new URL(window.location.href);
    const params = new URLSearchParams();

    // Get all checked price filters
    const checkedPrices = Array.from(document.querySelectorAll('.price-filter:checked'))
        .map(cb => cb.value);
    
    checkedPrices.forEach(price => {
        params.append('price[]', price);
    });

    // Get sort value
    const sortValue = document.getElementById('sortSelect').value;
    if (sortValue && sortValue !== 'latest') {
        params.set('sort', sortValue);
    }

    // Redirect with new parameters
    window.location.href = url.pathname + (params.toString() ? '?' + params.toString() : '');
}
```

## URL Structure

### Query Parameters
Filters and sorting are passed via URL query parameters:

**Price Filters:**
```
/products?price[]=under-2000
/products?price[]=under-2000&price[]=2000-4000
```

**Sorting:**
```
/products?sort=price-low
/products?sort=price-high
```

**Combined:**
```
/products?price[]=above-4000&sort=price-high
/products/category/scrubs?price[]=2000-4000&sort=name
```

## User Experience Features

1. **Instant Feedback**: Filters apply immediately when changed
2. **State Persistence**: Selected filters remain checked after page reload
3. **Multiple Selections**: Users can select multiple price ranges
4. **Smart Pricing**: Uses sale price when available, falls back to regular price
5. **Pagination Support**: Filters persist across pagination pages using `->withQueryString()`
6. **Clean URLs**: Parameters are clearly readable in the URL

## Customization Options

### Adding New Price Ranges
1. Add checkbox in the view with a new value:
```html
<input type="checkbox" 
       name="price[]" 
       value="5000-10000" 
       class="price-filter">
```

2. Add corresponding logic in `ProductController`:
```php
elseif ($range == '5000-10000') {
    $q->orWhereRaw('COALESCE(sale_price, price) BETWEEN 5000 AND 10000');
}
```

### Adding New Sort Options
1. Add option in the select dropdown:
```html
<option value="popular">Most Popular</option>
```

2. Add sorting logic in `applySorting()` method:
```php
case 'popular':
    $query->orderBy('views', 'DESC');
    break;
```

## Browser Compatibility
- Modern browsers (Chrome, Firefox, Safari, Edge)
- ES6 JavaScript features used (arrow functions, template literals, Array.from)
- Gracefully degrades if JavaScript is disabled

## Performance Considerations
- Database queries use indexes on `price` and `sale_price` columns
- Pagination limits results to 12 products per page
- Eager loading of relationships prevents N+1 queries
- URL parameters allow for bookmarking and sharing filtered results

## Future Enhancements
Potential additions for the future:
- AJAX-based filtering (no page reload)
- Loading spinner during filter application
- Filter result counts before applying
- Stock status filtering
- Size/color variant filtering
- Brand filtering
- Customer rating filtering
- Date range filtering

---

**Last Updated**: October 2024  
**Version**: 1.0

