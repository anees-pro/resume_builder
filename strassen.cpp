#include <iostream>
#include <vector>

// Function to add two matrices
std::vector<std::vector<int>> matrix_add(const std::vector<std::vector<int>>& A, const std::vector<std::vector<int>>& B) {
    int n = A.size();
    std::vector<std::vector<int>> C(n, std::vector<int>(n));

    for (int i = 0; i < n; i++) {
        for (int j = 0; j < n; j++) {
            C[i][j] = A[i][j] + B[i][j];
        }
    }

    return C;
}

// Function to subtract two matrices
std::vector<std::vector<int>> matrix_subtract(const std::vector<std::vector<int>>& A, const std::vector<std::vector<int>>& B) {
    int n = A.size();
    std::vector<std::vector<int>> C(n, std::vector<int>(n));

    for (int i = 0; i < n; i++) {
        for (int j = 0; j < n; j++) {
            C[i][j] = A[i][j] - B[i][j];
        }
    }

    return C;
}

// Function to multiply two matrices using Strassen's algorithm
std::vector<std::vector<int>> strassen_multiply(const std::vector<std::vector<int>>& A, const std::vector<std::vector<int>>& B) {
    int n = A.size();

    // Base case: If the matrices are 1x1, perform a simple multiplication
    if (n == 1) {
        std::vector<std::vector<int>> C(1, std::vector<int>(1));
        C[0][0] = A[0][0] * B[0][0];
        return C;
    }

    // Split the matrices into quadrants
    int half_size = n / 2;
    std::vector<std::vector<int>> A11(half_size, std::vector<int>(half_size));
    std::vector<std::vector<int>> A12(half_size, std::vector<int>(half_size));
    std::vector<std::vector<int>> A21(half_size, std::vector<int>(half_size));
    std::vector<std::vector<int>> A22(half_size, std::vector<int>(half_size));

    std::vector<std::vector<int>> B11(half_size, std::vector<int>(half_size));
    std::vector<std::vector<int>> B12(half_size, std::vector<int>(half_size));
    std::vector<std::vector<int>> B21(half_size, std::vector<int>(half_size));
    std::vector<std::vector<int>> B22(half_size, std::vector<int>(half_size));

    for (int i = 0; i < half_size; i++) {
        for (int j = 0; j < half_size; j++) {
            A11[i][j] = A[i][j];
            A12[i][j] = A[i][j + half_size];
            A21[i][j] = A[i + half_size][j];
            A22[i][j] = A[i + half_size][j + half_size];

            B11[i][j] = B[i][j];
            B12[i][j] = B[i][j + half_size];
            B21[i][j] = B[i + half_size][j];
            B22[i][j] = B[i + half_size][j + half_size];
        }
    }

    // Calculate intermediate matrices
    std::vector<std::vector<int>> M1 = strassen_multiply(matrix_add(A11, A22), matrix_add(B11, B22));
    std::vector<std::vector<int>> M2 = strassen_multiply(matrix_add(A21, A22), B11);
    std::vector<std::vector<int>> M3 = strassen_multiply(A11, matrix_subtract(B12, B22));
    std::vector<std::vector<int>> M4 = strassen_multiply(A22, matrix_subtract(B21, B11));
    std::vector<std::vector<int>> M5 = strassen_multiply(matrix_add(A11, A12), B22);
    std::vector<std::vector<int>> M6 = strassen_multiply(matrix_subtract(A21, A11), matrix_add(B11, B12));
    std::vector<std::vector<int>> M7 = strassen_multiply(matrix_subtract(A12, A22), matrix_add(B21, B22));

    // Calculate result matrices
    std::vector<std::vector<int>> C11 = matrix_add(matrix_subtract(matrix_add(M1, M4), M5), M7);
    std::vector<std::vector<int>> C12 = matrix_add(M3, M5);
    std::vector<std::vector<int>> C21 = matrix_add(M2, M4);
    std::vector<std::vector<int>> C22 = matrix_add(matrix_add(matrix_subtract(M1, M2), M3), M6);

    // Combine the result matrices into a single matrix
    std::vector<std::vector<int>> C(n, std::vector<int>(n));
    for (int i = 0; i < half_size; i++) {
        for (int j = 0; j < half_size; j++) {
            C[i][j] = C11[i][j];
            C[i][j + half_size] = C12[i][j];
            C[i + half_size][j] = C21[i][j];
            C[i + half_size][j + half_size] = C22[i][j];
        }
    }

    return C;
}

// Function to print a matrix
void print_matrix(const std::vector<std::vector<int>>& matrix) {
    int n = matrix.size();
    for (int i = 0; i < n; i++) {
        for (int j = 0; j < n; j++) {
            std::cout << matrix[i][j] << " ";
        }
        std::cout << std::endl;
    }
}

int main() {
    int n;
    std::cout << "Enter the size of the square matrices: ";
    std::cin >> n;

    // Initialize matrices A and B with random values for demonstration
    std::vector<std::vector<int>> A(n, std::vector<int>(n));
    std::vector<std::vector<int>> B(n, std::vector<int>(n));
    std::vector<std::vector<int>> C;

    std::cout << "Enter values for matrix A:" << std::endl;
    for (int i = 0; i < n; i++) {
        for (int j = 0; j < n; j++) {
            std::cin >> A[i][j];
        }
    }

    std::cout << "Enter values for matrix B:" << std::endl;
    for (int i = 0; i < n; i++) {
        for (int j = 0; j < n; j++) {
            std::cin >> B[i][j];
        }
    }

    // Check if the matrices are square and have dimensions that are powers of 2
    if (n == 0 || (n & (n - 1)) != 0) {
        std::cerr << "Matrix dimensions must be powers of 2 and square." << std::endl;
        return 1;
    }

    // Pad the matrices with zeros if they are not of the required size
    int next_power_of_two = 1;
    while (next_power_of_two < n) {
        next_power_of_two *= 2;
    }

    if (n < next_power_of_two) {
        // Pad matrix A
        for (int i = 0; i < n; i++) {
            A[i].resize(next_power_of_two, 0);
        }
        A.resize(next_power_of_two, std::vector<int>(next_power_of_two, 0));
    }

    if (n < next_power_of_two) {
        // Pad matrix B
        for (int i = 0; i < n; i++) {
            B[i].resize(next_power_of_two, 0);
        }
        B.resize(next_power_of_two, std::vector<int>(next_power_of_two, 0));
    }

    // Perform Strassen's matrix multiplication
    C = strassen_multiply(A, B);

    // Display the result
    std::cout << "Matrix A:" << std::endl;
    print_matrix(A);

    std::cout << "Matrix B:" << std::endl;
    print_matrix(B);

    std::cout << "Result (Matrix C):" << std::endl;
    print_matrix(C);

    return 0;
}