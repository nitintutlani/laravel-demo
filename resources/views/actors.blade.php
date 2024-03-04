<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actors</title>

    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 py-8 px-4">
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Actors</h1>

        <div class="flex">
            <input type="text" id="name" placeholder="Search for actors..." class="p-2 border rounded flex-grow">
            <button id="searchButton" class="p-2 bg-blue-500 text-white rounded ml-2">Search</button>
        </div>
        <table id="actorsTable" class="table-auto w-full mt-4">
            <thead>
                <tr>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Birth Year</th>
                <th class="px-4 py-2">Gender</th>
                </tr>
            </thead>
            <tbody id="tableBody" class="text-center">
                <!-- Actors data will be inserted here -->
            </tbody>
        </table>

        <div id="pagination" class="flex justify-center mt-4">
            <!-- Pagination buttons will be inserted here -->
        </div>
    </div>

    <!-- Include your JavaScript file -->
    <script src="{{ asset('js/actors.js') }}"></script>
</body>
</html>