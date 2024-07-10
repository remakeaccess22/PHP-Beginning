<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p class= "mb-6">
            <a href="/notes" class="text-blue-500 hover:underline">Back to Notes</a>
        </p>

        <p><?= htmlspecialchars($note['body']) ?></p>

        <footer class ="mt-6">
        <a href="note/edit?id=<?= $note['id'] ?>" class="bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-opacity-50">Edit</a>
        </footer>
       
        <!-- <form class = "mt-6" method ="POST">
            <input type = "hidden" name = "_method" value = "DELETE">
            <input type = "hidden" name = "id" value = "<?= $note['body'] ?>">
            <button class = "bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                Delete
            </button>
        </form> -->
      
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>