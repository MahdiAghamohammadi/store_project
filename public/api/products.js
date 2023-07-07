document.addEventListener("DOMContentLoaded", () => {
    const getProducts = async () => {
        try {
            const productsContainer = document.getElementById("products");
            let col = "";
            const res = await fetch("http://127.0.0.1:8000/api/products", {
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                },
            });
            const result = await res.json();
            result.data.map((product) => {
                col = `<div class="col">
                <div class="card shadow-sm">
                    <img src="${product.image.indexArray.medium}" alt="${product.name}" />

                    <div class="card-body">
                        <p class="card-text">${product.name}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm  btn-danger">ویرایش</button>
                                <button type="button" class="btn btn-sm  btn-success">حذف</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`;
                productsContainer.innerHTML += col;
            });
        } catch (error) {
            console.log(error);
        }
    };
    getProducts();
});
