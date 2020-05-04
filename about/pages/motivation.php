<div id="content">
<h2 id="motivation">Motivation</h2>

===== Motivation =====

Project should provide universal protocol as a more feature-rich alternative to currently used binary protocols. It should provide general methods for handling various types of data including:

  * **Multimedia files** - Audio, Video, Animation
  * **Filesystem structure** - Allow to represent data in the form of filesystem or as compressed archive
  * **Application API** - Remote or local methods execution supporting parameters and result passing
  * **Serialization protocol** - Provide ability to serialize structured data
  * **Long-term data storage** - Provide way to define data with separate or integrated specification
  * **Huge data** - Use dynamic numeric values to allow support for data in terabytes range or more
  * **Representation of segmented, fragmented or indexed data**

The protocol is also intended to bring advantages of modern markup languages like XML into binary world. It's a ground-up designed alternative focused on binary data, yet providing similar techniques like XML Schema, XML Namespaces, XSLT and so on.

Where applicable, project should also include concepts from other similar protocols, like for example:

  * **RIFF** - Resource Interchange File Format
  * **HDF5/CDF** - Hierarchical Data Format / Common Data Format
  * **ASN.1** - Abstract Syntax Notation One
  * **Matroska/EBML** - Extensible Binary Meta Language
  * **Protocol Buffers** - Serialization protocol for binary data exchange

===== Design Principles =====

Project is using bottom-up approach with layers building on top of each other adding gradually new functionality.

Some of the design principles:

  * **Small steps** - Project should be build and evolve by adding small and independent functionality
  * **Universaility first** - Focus should be on support of wide range of use-cases and provide extensibility instead of fixed and compact structure
  * **Abstraction** - Data should be defined using abstraction instead of vague description only

===== More =====

You can learn more about this project by reading following sections:

  * [[en:about:use_cases|Use Cases]]
  * [[en:about:goals|Goals]]
  * [[en:about:project_scope|Scope]]
  * [[en:about:logo|Project Logo]]

</div>
</body>
</html>