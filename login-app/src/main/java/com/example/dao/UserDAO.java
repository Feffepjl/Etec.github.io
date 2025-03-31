package com.example.dao;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

import org.mindrot.jbcrypt.BCrypt;

import com.example.model.User;

import java.time.LocalDateTime;
import java.util.ArrayList;
import java.util.List;

public class UserDAO {
    private static final String DB_URL = "jdbc:sqlite:login.db";
    private Connection connection;

    public UserDAO() {
        initializeDatabase();
    }

    private void initializeDatabase() {
        try {
            connection = DriverManager.getConnection(DB_URL);
            createTableIfNotExists();
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    private void createTableIfNotExists() throws SQLException {
        String createTableSQL = "CREATE TABLE IF NOT EXISTS users (" +
                "id INTEGER PRIMARY KEY AUTOINCREMENT," +
                "email TEXT NOT NULL UNIQUE," +
                "password TEXT NOT NULL," +
                "created_at DATETIME DEFAULT CURRENT_TIMESTAMP)";
        
        try (Statement stmt = connection.createStatement()) {
            stmt.execute(createTableSQL);
        }
    }

    public boolean authenticateUser(User user) {
        String query = "SELECT password FROM users WHERE email = ?";
        
        try (PreparedStatement pstmt = connection.prepareStatement(query)) {
            pstmt.setString(1, user.getEmail());
            ResultSet rs = pstmt.executeQuery();
            
            if (rs.next()) {
                String hashedPassword = rs.getString("password");
                return BCrypt.checkpw(user.getPassword(), hashedPassword);
            }
            return false;
            
        } catch (SQLException e) {
            e.printStackTrace();
            return false;
        }
    }

    public boolean registerUser(User user) {
        String query = "INSERT INTO users (email, password) VALUES (?, ?)";
        
        try (PreparedStatement pstmt = connection.prepareStatement(query)) {
            String hashedPassword = BCrypt.hashpw(user.getPassword(), BCrypt.gensalt());
            pstmt.setString(1, user.getEmail());
            pstmt.setString(2, hashedPassword);
            
            return pstmt.executeUpdate() > 0;
            
        } catch (SQLException e) {
            e.printStackTrace();
            return false;
        }
    }

    public List<User> getAllUsers() {
        List<User> users = new ArrayList<>();
        String query = "SELECT id, email, created_at FROM users ORDER BY created_at DESC";
        
        try (Statement stmt = connection.createStatement();
             ResultSet rs = stmt.executeQuery(query)) {
            
            while (rs.next()) {
                User user = new User(
                    rs.getInt("id"),
                    rs.getString("email"),
                    null, // Don't retrieve passwords
                    rs.getTimestamp("created_at").toLocalDateTime()
                );
                users.add(user);
            }
            
        } catch (SQLException e) {
            e.printStackTrace();
        }
        
        return users;
    }

    public void close() {
        try {
            if (connection != null && !connection.isClosed()) {
                connection.close();
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
} 