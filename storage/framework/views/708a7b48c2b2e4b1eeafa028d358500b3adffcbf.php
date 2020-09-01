<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <div class="border p-4">
            <h1 class="h5 mb-4">
                <?php echo e($post->title); ?>

            </h1>

            <p class="mb-5">
                <?php echo nl2br(e($post->body)); ?>

            </p>

            <section>
                <h2 class="h5 mb-4">
                    コメント
                </h2>

                <?php $__empty_1 = true; $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="border-top p-4">
                        <time class="text-secondary">
                            <?php echo e($comment->created_at->format('Y.m.d H:i')); ?>

                        </time>
                        <p class="mt-2">
                            <?php echo nl2br(e($comment->body)); ?>

                        </p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p>コメントはまだありません。</p>
                <?php endif; ?>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/Kiddingly-board/laravel-bbs/resources/views/posts/show.blade.php ENDPATH**/ ?>