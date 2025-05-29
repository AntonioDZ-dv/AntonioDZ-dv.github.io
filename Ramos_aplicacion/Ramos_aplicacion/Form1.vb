Imports MySql.Data.MySqlClient

Public Class Form1
    ' Cambia las credenciales según tu configuración
    Dim connectionString As String = "server=localhost;user=root;password=123456789;database=negocio_ramos"

    ' Método para cargar los datos en el DataGridView
    Private Sub CargarDatos()
        Dim connection As New MySqlConnection(connectionString)
        Dim adapter As New MySqlDataAdapter("SELECT * FROM pedidos", connection)
        Dim table As New DataTable()

        Try
            connection.Open()
            adapter.Fill(table)
            DataGridView1.DataSource = table
        Catch ex As Exception
            MessageBox.Show("Error: " & ex.Message)
        Finally
            connection.Close()
        End Try
    End Sub

    ' Cargar datos al iniciar el formulario
    Private Sub Form1_Load(sender As Object, e As EventArgs) Handles MyBase.Load
        CargarDatos()
    End Sub

    ' Botón para actualizar los datos
    Private Sub btnActualizar_Click(sender As Object, e As EventArgs) Handles btnActualizar.Click
        CargarDatos()
    End Sub

    ' Enviar comentario de admin
    Private Sub btnEnviarComentario_Click(sender As Object, e As EventArgs) Handles btnEnviarComentario.Click
        If String.IsNullOrWhiteSpace(txtComentario.Text) Then
            MessageBox.Show("Por favor, escribe un comentario.")
            Exit Sub
        End If

        Dim connection As New MySqlConnection(connectionString)
        Dim query As String = "INSERT INTO admin_comments (comentario) VALUES (@comentario)"
        Dim command As New MySqlCommand(query, connection)
        command.Parameters.AddWithValue("@comentario", txtComentario.Text)

        Try
            connection.Open()
            command.ExecuteNonQuery()
            MessageBox.Show("Comentario enviado correctamente.")
            txtComentario.Text = ""
        Catch ex As Exception
            MessageBox.Show("Error: " & ex.Message)
        Finally
            connection.Close()
        End Try
    End Sub

End Class
