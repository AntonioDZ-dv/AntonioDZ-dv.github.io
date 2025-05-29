Imports MySql.Data.MySqlClient

Public Class Form3
    Dim conexion As MySqlConnection
    Dim comando As MySqlCommand
    Dim conexionString As String = "server=localhost;user id=root;password=123456789;database=negocio_ramos"

    Private Sub Form3_Load(sender As Object, e As EventArgs) Handles MyBase.Load
        Try
            conexion = New MySqlConnection(conexionString)
            conexion.Open()
            MessageBox.Show("Conexión exitosa con la base de datos.", "Éxito", MessageBoxButtons.OK, MessageBoxIcon.Information)
        Catch ex As Exception
            MessageBox.Show("Error al conectar con la base de datos: " & ex.Message, "Error", MessageBoxButtons.OK, MessageBoxIcon.Error)
        End Try
    End Sub

    ' Función para insertar datos en la base de datos solo cuando se presiona el botón Enviar
    Private Sub GuardarDatos()
        If String.IsNullOrWhiteSpace(txtNombre.Text) OrElse
           String.IsNullOrWhiteSpace(txtApellido.Text) OrElse
           String.IsNullOrWhiteSpace(txtCorreo.Text) OrElse
           String.IsNullOrWhiteSpace(txtNumero.Text) OrElse
           String.IsNullOrWhiteSpace(cboRamos.Text) Then
            MessageBox.Show("Por favor, complete todos los campos antes de guardar.", "Aviso", MessageBoxButtons.OK, MessageBoxIcon.Warning)
            Exit Sub ' No se guardan datos si algún campo está vacío
        End If

        Try
            Dim query As String = "INSERT INTO pedidos (nombre_cliente, apellido, correo, numero_celular, ramo) VALUES (@nombre, @apellido, @correo, @numero, @ramo)"
            comando = New MySqlCommand(query, conexion)
            comando.Parameters.AddWithValue("@nombre", txtNombre.Text)
            comando.Parameters.AddWithValue("@apellido", txtApellido.Text)
            comando.Parameters.AddWithValue("@correo", txtCorreo.Text)
            comando.Parameters.AddWithValue("@numero", txtNumero.Text)
            comando.Parameters.AddWithValue("@ramo", cboRamos.Text)

            comando.ExecuteNonQuery()
            MessageBox.Show("Datos guardados correctamente.", "Éxito", MessageBoxButtons.OK, MessageBoxIcon.Information)
        Catch ex As Exception
            MessageBox.Show("Error al guardar datos: " & ex.Message, "Error", MessageBoxButtons.OK, MessageBoxIcon.Error)
        End Try
    End Sub

    ' Botón para enviar manualmente los datos a la base de datos
    Private Sub btnEnviar_Click(sender As Object, e As EventArgs) Handles btnEnviar.Click
        GuardarDatos()
    End Sub

End Class
