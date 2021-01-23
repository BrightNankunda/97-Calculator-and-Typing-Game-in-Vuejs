<template>
<div>
    <div class="mt-2 ml-1">
        <div class="left">

            <div class="col-md-3 ">
                <div class="card mb-2">
                    <div class="card-body">
                        <h4 class="card-title">Card 1</h4>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a class="btn btn-primary">Button</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-2">
                    <div class="card-body">
                        <h4 class="card-title">Card 2</h4>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a class="btn btn-primary">Button</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-2">
                    <div class="card-body">
                        <h4 class="card-title">Card 3</h4>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a class="btn btn-primary">Button</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-2">
                    <div class="card-body">
                        <h4 class="card-title">Card 4</h4>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a class="btn btn-primary">Button</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-2">
                    <div class="card-body">
                        <h4 class="card-title">Card 5</h4>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a class="btn btn-primary">Button</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-2">
                    <div class="card-body">
                        <h4 class="card-title">Card 6</h4>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a class="btn btn-primary">Button</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-2">
                    <div class="card-body">
                        <h4 class="card-title">Card 7</h4>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a class="btn btn-primary">Button</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-2">
                    <div class="card-body">
                        <h4 class="card-title">Card 8</h4>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a class="btn btn-primary">Button</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-2">
                    <div class="card-body">
                        <h4 class="card-title">Card 9</h4>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a class="btn btn-primary">Button</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-2">
                    <div class="card-body">
                        <h4 class="card-title">Card 10</h4>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a class="btn btn-primary">Button</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-2">
                    <div class="card-body">
                        <h4 class="card-title">Card 11</h4>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a class="btn btn-primary">Button</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button id="prevBtn" class="btn btn-primary" @click="prev(-3)">.</button>
    <button id="nextBtn" class="btn btn-primary" @click="next(3)">.</button>
</div>
</template>

<script>
export default {
    methods: {
        prev() {
            alert('expecting to slide back')
        },
        next() {
            alert('expecting to slide forward')
        }
    }
}
</script>

<style scoped>
.left {
    display: flex;
}

#prevBtn {
    position: relative;
    height: 20px;
    width: 20px;
    top: 0px;
    border: none;
    border-radius: 50%;
    font-size: 15px;

}

#prevBtn:hover {
    height: 21px;
    width: 21px;
    border: none;
    border-radius: 50%;
    font-size: 50%;
}

#nextBtn {
    position: relative;
    top: 50%;
    height: 20px;
    width: 20px;
    border: none;
    font-size: 15px;
    border-radius: 50%;
}

#nextBtn:hover {
    height: 20px;
    width: 20px;
    border: none;
    border-radius: 50%;
}

.card {}
</style>
