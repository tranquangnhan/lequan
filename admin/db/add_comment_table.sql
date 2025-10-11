CREATE TABLE IF NOT EXISTS binhluan (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_product INT NOT NULL,
    id_user INT NOT NULL,
    noidung TEXT NOT NULL,
    rating INT NOT NULL CHECK (rating >= 1 AND rating <= 5),
    ngaybinhluan TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    trangthai INT DEFAULT 1,
    FOREIGN KEY (id_product) REFERENCES products(id),
    FOREIGN KEY (id_user) REFERENCES user(id)
);